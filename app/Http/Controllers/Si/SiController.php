<?php

namespace App\Http\Controllers\Si;

use App\Events\UpdateCumulativePrice;
use App\Events\UpdateDebuff;
use App\Events\UpdateGameBesar;
use App\Http\Controllers\Controller;
use App\Models\GameBesarSession;
use App\Models\Player;
use App\Models\Dragon;
use Illuminate\Http\Request;
use App\Enums\BackpackEnum;
use App\Enums\ExtraBreathEnum;
use App\Enums\PotionEnum;
use App\Enums\PowerSkillEnum;
use App\Enums\RestoreEnum;
use App\Enums\SemifinalEnum;
use App\Enums\UltimateEnum;
use App\Models\Alpha;
use App\Models\Backpack;
use App\Models\Debuff;
use App\Models\History;
use App\Models\MarketLog;
use App\Models\Potions;
use App\Models\Team;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// Uncomment ini waktu Hari H
//define('UNAUTHORIZED', [
//    1, 2, 3, 4, 5,
//    6, 7, 8, 9, 10,
//    11, 12, 13, 14, 15,
//    16, 17, 28, 19, 20
//]);

class SiController extends Controller
{
    public function ajaxResponse($isError, $msg, $haystack = [], $status = 200) {
        // Default Response
        $response = [
            'isError' => $isError,
            'msg' => $msg
        ];

        // Additional Response
        if (count($haystack) != 0) {
            foreach ($haystack as $key => $value) {
                $response += [$key => $value];
            }
        }

        return response()->json($response, $status);
    }

    public function checkSession() {
        $session = GameBesarSession::where('open', '<=', Carbon::now())
                                ->where('close', '>=', Carbon::now())
                                ->first();

        return $session;
//        return response()->json(compact('session'), 200);
    }

    public function testPusher(Request $request) {
//        event(new UpdateGameBesar("PUSHER MESSAGE: TEST DARI CONTROLLER"));
//        event(new UpdateDebuff(Auth::user()->id, "PUSHER PRIVAET MESSAGE: Message buat " . auth()->user()->username));
        $player = Player::find(1);
        event(new UpdateCumulativePrice($player, auth()->user()->id));
        return $this->ajaxResponse(false, "Ini Response AJAX");
    }

    public function index(){
        $players = Player::select('teams.name as team_name', 'players.*')
        ->join('teams', 'teams.id', '=', 'players.team_id')
        ->get();

        return view('si.index', compact('players'));
    }

    // Buat Pilih Player (Tim)
    public function playerDetail(Request $request) {
        $session = $this->checkSession();
        if (!$session) return $this->ajaxResponse(true, "Game Besar Belum Dibuka!");
        $playerId = $request->player;
        $player = Player::find($playerId);
        $dragon = Dragon::where('threshold', '<=', $player->cycle)->orderby('threshold', 'desc')->first();
        $egg = DB::table('dragons')->first();
        if ($player) {
            $numOfAttack =History::all()->count();
            $isAttacked =  $numOfAttack % 15 == 0 ? false : true;
            $willAttack = ($numOfAttack == 0) ? false : !$isAttacked;
            $alpha = Alpha::get()[0];
            $buff = ($session->players()->get()->count() < $session->max_team) && ($session->players()->wherePivot('player_id', $player->id)->get()->isEmpty());
            $backpack = 1000 +(($player->backpack()->get()->isEmpty()) ?  0 : $player->backpack->count  ) *  BackpackEnum::BUFF_IN_CYCLE->value;
            // event(new UpdateCumulativePrice($player, auth()->user()->id));
            event(new UpdateGameBesar($numOfAttack, $alpha->health, $willAttack, $buff));

            event(new UpdateCumulativePrice($player, auth()->user()->id));

            // Debuff Count
            $debuffCount = $player->debuffs()->wherePivot('status', 1)->count();
            event(new UpdateDebuff(auth()->user()->id, $debuffCount));

            return response()->json(compact('player', 'dragon', 'backpack', 'numOfAttack'), 200);
        }else{
            return response()->json(['error' => 'Player not found'], 404);
        }
    }

    public function test()
    {
        $session = $this->checkSession();
        $player = Player::find(1);

        if ($session) {
            // if ($session->players()->get()->count() < $session->max_team)
            $buff = $session->players()->wherePivot('player_id', $player->id)->get()->isEmpty();
            dd($buff);
        }
    }

    //coba baru
    public function detailTeam(Request $request){
        $teamId = $request->input('player');
        $player = Player::with('team')
                ->where('id', $teamId )
                ->first();
        return response()->json(compact('player'), 200);
    }

    // ========== Nathan ==========
    public function attack(Player $player) {
        $session = $this->checkSession();
        if (!$session) return $this->ajaxResponse(true, "Game Besar Belum Dibuka!");

        DB::beginTransaction();
        try {
            //if($player ->cycle >= 100); //Kalau sudah diatas egg (cycle atleast 100) -> ganti status jadi false
            $alpha = Alpha::get()[0];
            if($player->cycle < 100) return $this->ajaxResponse(true, "Cycle anda tidak mencukupi untuk melakukan attack!");
            if($player->dragon_breath < 1) return $this->ajaxResponse(true, "Dragon Breath anda tidak cukup untuk melakukan serangan terhadap Alpha!");
            if (!($alpha->health > 0)) return $this->ajaxResponse(true, "Tidak dapat menyerang Alpha! Alpha sudah dikalahkan!");

            $player->update([
                'dragon_breath' => $player->dragon_breath-1
            ]);

            MarketLog::create([
                'player_id' => $player->id,
                'desc' => $player->team->name . " melakukan serangan",
                'cycle' => $player->cycle,
            ]);
            $damageAwal = $player->cycle;

            // Buff  Session
            $flag = "";
            $playerCount = $session->players()->get()->count();
            if ($playerCount < $session->max_team && $session->players()->wherePivot('player_id', $player->id)-> get()->isEmpty()) {
                $damageAwal *= $session->multiplier;
                $session->players()->attach($player->id);
                $flag =  " (Power Up)";
            }

            //Debuff
            $debuffActiveCount = $player->debuffs()->wherePivot('status', 1)->get()->count();
            $damage = $damageAwal * pow(0.75, $debuffActiveCount);

            $alpha -> update([
                'health' => $alpha->health - $damage
            ]);

            $dragonModel = Dragon::where('threshold' , '<=', $player->cycle)
                                ->orderBy('id', 'DESC')->first();
            $dragon = $dragonModel ->name;

            History::create([
                'dragon_id' => $dragonModel->id,
                'session_id' => $session->id,
                'player_id' => $player->id,
                'total_damage' => $damage,
                'damage' => $damageAwal
            ]);

            $cycle = $player->cycle;
            $backpack = 1000 +(($player->backpack()->get()->isEmpty()) ?  0 : $player->backpack->count  ) *  BackpackEnum::BUFF_IN_CYCLE->value;
            $type = 'attack';
            $numOfAttack =History::all()->count();
            $isAttacked =  $numOfAttack % 15 == 0 ? false : true;
            $buff = ($session->players()->get()->count() < $session->max_team) && ($session->players()->wherePivot('player_id', $player->id)->get()->isEmpty());
            $dragon_breath = $player->dragon_breath;

            if (!$isAttacked)
            {
                $debuff = Debuff::create([
                    'session_id' => $session->id
                ]);

                $players = Player::all();

                foreach ($players as $p) {
                    $attr = [
                        $p->id  =>  ['status' => 1]
                    ];

                    $debuff->players()->attach($attr);
                }

                // Debuff Count
                $debuffCount = $player->debuffs()->wherePivot('status', 1)->count();
                event(new UpdateDebuff(auth()->user()->id, $debuffCount));
            }

            // Call Pusher
            event(new UpdateGameBesar($numOfAttack, $alpha->health, !$isAttacked, $buff));
            DB::commit();

            return $this -> ajaxResponse(false, 'Anda berhasil melakukan Attack ' . $damage . $flag, compact('dragon', 'cycle', 'backpack', 'type', 'isAttacked', 'damage', 'dragon_breath', 'numOfAttack'));

        } catch (Exception $x){
                DB::rollBack();
                return $this->ajaxResponse(true, $x->getMessage());
        }


    }

    // Buat Beli dan Pakai Power Skill
    // ========== Yosua ==========
    public function powerSkillAttack(Player $player) {
        $session = $this->checkSession();
        if (!$session) return $this->ajaxResponse(true, "Game Besar Belum Dibuka!");

        DB::beginTransaction();
        try {
            $cost = PowerSkillEnum::PRICE->value;

            //if($player ->cycle >= 100); //Kalau sudah diatas egg (cycle atleast 100) -> ganti status jadi false
            $alpha = Alpha::get()[0];
            if($player->cycle - $cost < 100) return $this->ajaxResponse(true, "Cycle anda tidak mencukupi untuk membeli Power Skill! atau Sisa cycle anda harus lebih dari 100!");
            if($player->dragon_breath < 1) return $this->ajaxResponse(true, "Dragon Breath anda tidak cukup untuk melakukan serangan terhadap Alpha!");
            if (!($alpha->health > 0)) return $this->ajaxResponse(true, "Tidak dapat menyerang Alpha! Alpha sudah dikalahkan!");

            $player->update([
                'cycle' => $player->cycle - $cost,
                'dragon_breath' => $player->dragon_breath-1
            ]);

            MarketLog::create([
                'player_id' => $player->id,
                'desc' => $player->team->name . " membeli dan menggunakan power skill",
                'cycle' => $cost
            ]);
            $damageAwal = $player->cycle * 1.5;

            // Buff  Session
            $flag = "";
            $playerCount = $session->players()->get()->count();
            if ($playerCount < $session->max_team && $session->players()->wherePivot('player_id', $player->id)-> get()->isEmpty()) {
                $damageAwal *= $session->multiplier;
                $session->players()->attach($player->id);
                $flag = " (Power Up)";
            }


            //Debuff
            $debuffActiveCount = $player->debuffs()->wherePivot('status', 1)->get()->count();
            $damage = $damageAwal * pow(0.75, $debuffActiveCount);

            $alpha -> update([
                'health' => $alpha->health - $damage
            ]);

            $dragonModel = Dragon::where('threshold' , '<=', $player->cycle)
                                ->orderBy('id', 'DESC')->first();
            $dragon = $dragonModel ->name;

            History::create([
                'dragon_id' => $dragonModel->id,
                'session_id' => $session->id,
                'player_id' => $player->id,
                'total_damage' => $damage,
                'damage' => $damageAwal
            ]);
            $cycle = $player->cycle;
            $backpack = 1000 +(  ($player -> backpack()->get()->isEmpty()) ?  0 : $player->backpack->count  ) *  BackpackEnum::BUFF_IN_CYCLE->value;
            $type = 'attack';
            $numOfAttack =History::all()->count();
            $isAttacked =  $numOfAttack % 15 == 0 ? false : true;
            $buff = ($session->players()->get()->count() < $session->max_team) && ($session->players()->wherePivot('player_id', $player->id)->get()->isEmpty());
            $dragon_breath = $player->dragon_breath;

            if (!$isAttacked)
            {
                $debuff = Debuff::create([
                    'session_id' => $session->id
                ]);

                $players = Player::all();

                foreach ($players as $p) {
                    $attr = [
                        $p->id  =>  ['status' => 1]
                    ];

                    $debuff->players()->attach($attr);
                }

                // Debuff Count
                $debuffCount = $player->debuffs()->wherePivot('status', 1)->count();
                event(new UpdateDebuff(auth()->user()->id, $debuffCount));
            }

            // Call Pusher
            event(new UpdateGameBesar($numOfAttack, $alpha->health, !$isAttacked, $buff));

            DB::commit();

            return $this -> ajaxResponse(false, 'Anda berhasil menyerang menggunakan Power Skill! dengan damage ' . $damage . $flag, compact('dragon', 'cycle', 'backpack', 'type', 'isAttacked', 'damage', 'dragon_breath'));

        } catch (Exception $x){
                DB::rollBack();
                return $this->ajaxResponse(true, $x->getMessage());
        }
    }

    // Buat Beli dan Pakai Ultimate (sekali aja)
    // ========== MA PATRICK ==========
    public function ultimateAttack(Player $player) {
        $session = $this->checkSession();
        if (!$session) return $this->ajaxResponse(true, "Game Besar Belum Dibuka!");

        DB::beginTransaction();
        try {
            $cost = UltimateEnum::PRICE->value;

            //if($player ->cycle >= 100); //Kalau sudah diatas egg (cycle atleast 100) -> ganti status jadi false
            $alpha = Alpha::get()[0];
            if($player->cycle - $cost < 100) return $this->ajaxResponse(true, "Cycle anda tidak mencukupi untuk membeli Ultimate Skill! atau Sisa cycle anda harus lebih dari 100!");
            if($player->dragon_breath < 1) return $this->ajaxResponse(true, "Dragon Breath anda tidak cukup untuk melakukan serangan terhadap Alpha!");
            if (!($alpha->health > 0)) return $this->ajaxResponse(true, "Tidak dapat menyerang Alpha! Alpha sudah dikalahkan!");
            if($player->ultimate)  return $this->ajaxResponse(true, "Player sudah pernah memakai Ultimate Skill");

            $player->update([
                'cycle' => $player->cycle - $cost,
                'dragon_breath' => $player->dragon_breath-1,
                'ultimate' => 1
            ]);

            MarketLog::create([
                'player_id' => $player->id,
                'desc' => $player->team->name . " membeli dan menggunakan ultimate skill",
                'cycle' => $cost
            ]);
            $damageAwal = $player->cycle * 2;

            // Buff  Session
            $flag = "";
            $playerCount = $session->players()->get()->count();
            if ($playerCount < $session->max_team && $session->players()->wherePivot('player_id', $player->id)-> get()->isEmpty()) {
                $damageAwal *= $session->multiplier;
                $session->players()->attach($player->id);
                $flag = " (Power Up)";
            }

            //Debuff
            $debuffActiveCount = $player->debuffs()->wherePivot('status', 1)->get()->count();
            $damage = $damageAwal * pow(0.75, $debuffActiveCount);

            $alpha -> update([
                'health'=>$alpha->health - $damage
            ]);

            $dragonModel = Dragon::where('threshold' , '<=', $player->cycle)
            ->orderBy('id', 'DESC')->first();
            $dragon = $dragonModel ->name;

            History::create([
                'dragon_id' => $dragonModel->id,
                'session_id' => $session->id,
                'player_id' => $player->id,
                'total_damage' => $damage,
                'damage' => $damageAwal
            ]);
            $cycle = $player->cycle;
            $backpack = 1000 + (($player -> backpack()->get()->isEmpty()) ?  0 : $player->backpack->count  ) *  BackpackEnum::BUFF_IN_CYCLE->value;
            $type = 'attack';
            $numOfAttack =History::all()->count();
            $isAttacked =  $numOfAttack % 15 == 0 ? false : true;
            $buff = ($session->players()->get()->count() < $session->max_team) && ($session->players()->wherePivot('player_id', $player->id)->get()->isEmpty());
            $dragon_breath = $player->dragon_breath;

            if (!$isAttacked)
            {
                $debuff = Debuff::create([
                    'session_id' => $session->id
                ]);

                $players = Player::all();

                foreach ($players as $p) {
                    $attr = [
                        $p->id  =>  ['status' => 1]
                    ];

                    $debuff->players()->attach($attr);
                }

                // Debuff Count
                $debuffCount = $player->debuffs()->wherePivot('status', 1)->count();
                event(new UpdateDebuff(auth()->user()->id, $debuffCount));
            }

            // Call Pusher
            event(new UpdateGameBesar($numOfAttack, $alpha->health, !$isAttacked, $buff));

            DB::commit();

            return $this -> ajaxResponse(false, 'Anda berhasil menyerang menggunakan Ultimate Skill! dengan damage ' . $damage . $flag, compact('dragon', 'cycle', 'backpack', 'type', 'isAttacked', 'damage', 'dragon_breath'));

        } catch (Exception $x){
                DB::rollBack();
                return $this->ajaxResponse(true, $x->getMessage());
        }
    }

    // Buat Beli Potion (sekali aja)
    // ========== Nathan ==========
    public function buyPotion(Player $player) {
        $session = $this->checkSession();
        if (!$session) return $this->ajaxResponse(true, "Game Besar Belum Dibuka!");
        $cost = PotionEnum::PRICE->value;
        //  return $this->ajaxResponse(true, $player->cycle);

        DB::beginTransaction();
        try {
            if($player->cycle < $cost) return $this->ajaxResponse(true, "Cycle anda tidak mencukupi untuk membeli Cycling Limited Potion!");
            if($player->potion()->get()->count()) return $this->ajaxResponse(true, "Player sudah pernah membeli Cycling Limited Potion!");
            $player->update([
                'cycle' => $player->cycle - $cost
            ]);

            Potions::create([
                'player_id' => $player->id,
                'end' => Carbon::now()->addMinutes(PotionEnum::DURATION_IN_MINUTE->value)
            ]);

            MarketLog::create([
                'player_id' => $player->id,
                'desc' => $player->team->name . " membeli 1 Cycling Limited Potion",
                'cycle' => $cost
            ]);

            $dragon = Dragon::where('threshold' , '<=', $player->cycle)
                                                ->orderBy('id', 'DESC')->first()->name;
            $cycle = $player->cycle;
            $backpack = 1000 +(  ($player -> backpack()->get()->isEmpty()) ?  0 : $player->backpack->count  ) *  BackpackEnum::BUFF_IN_CYCLE->value;
            $type = 'buy';

            DB::commit();

            return $this -> ajaxResponse(false, 'Anda berhasil membeli Cycling Limited Potion ', compact('dragon', 'cycle', 'backpack', 'type'));

        } catch (Exception $x){
                DB::rollBack();
                return $this->ajaxResponse(true, $x->getMessage());
        }

    }

    // Buat Beli Dragon Breath
    // ========== Yosua ==========
    public function buyDragonBreath(Player $player) {
        $session = $this->checkSession();
        if (!$session) return $this->ajaxResponse(true, "Game Besar Belum Dibuka!");
        $cost = ExtraBreathEnum::PRICE->value;
        //  return $this->ajaxResponse(true, $player->cycle);

        DB::beginTransaction();
        try {
            if($player->cycle < $cost) return $this->ajaxResponse(true, "Cycle anda tidak mencukupi untuk membeli Dragon Breath!");
            $player->update([
                'dragon_breath' => $player->dragon_breath +1,
                'cycle' => $player->cycle - $cost
            ]);

            MarketLog::create([
                'player_id' => $player->id,
                'desc' => $player->team->name . " membeli 1 Dragon Breath",
                'cycle' => $cost
            ]);

            $dragon = Dragon::where('threshold' , '<=', $player->cycle)
                                                ->orderBy('id', 'DESC')->first()->name;
            $cycle = $player->cycle;
            $backpack = 1000 +(  ($player -> backpack()->get()->isEmpty()) ?  0 : $player->backpack->count  ) *  BackpackEnum::BUFF_IN_CYCLE->value;
            $type = 'buy';

            DB::commit();

            return $this -> ajaxResponse(false, 'Anda berhasil membeli Dragon Breath', compact('dragon', 'cycle', 'backpack', 'type'));

        } catch (Exception $x){
                DB::rollBack();
                return $this->ajaxResponse(true, $x->getMessage());
        }
     }

    // Buat Beli Backpack
    // ========== Ma Patrick ==========
    public function buyBackpack(Player $player) {
        $session = $this->checkSession();
        if (!$session) return $this->ajaxResponse(true, "Game Besar Belum Dibuka!");
        $cost = BackpackEnum::PRICE->value;
        $max = BackpackEnum::MAX->value;

        DB::beginTransaction();
        try {
            $backpackAvailable = $player->backpack()->get()->isEmpty() ? 0 : $player->backpack->count;
            // return $this->ajaxResponse(true, $backpackAvailable);
            if($backpackAvailable >= 5) return $this->ajaxResponse(true, "Backpack player sudah level maksimal!");
            if(($player->cycle - ($cost + $backpackAvailable * BackpackEnum::PRICE->value)) < 100) return $this->ajaxResponse(true, "Cycle anda tidak mencukupi untuk mengupgrade Backpack!");
            $player->update([
                'cycle' => $player->cycle - ($cost + $backpackAvailable * BackpackEnum::PRICE->value)
            ]);

            MarketLog::create([
                'player_id' => $player->id,
                'desc' => $player->team->name . " mengupgrade Backpack 1 Level",
                'cycle' => $cost + $backpackAvailable * BackpackEnum::PRICE->value
            ]);

            if (!$backpackAvailable) {
                Backpack::create([
                    'player_id' => $player->id,
                    'count' => 1
                ]);
            } else {
                $player->backpack()->update(['count' => $player->backpack->count + 1]);
            }

            $dragon = Dragon::where('threshold' , '<=', $player->cycle)
                                                ->orderBy('id', 'DESC')->first()->name;
            $cycle = $player->cycle;
            $backpack = 1000 +(  ($player -> backpack()->get()->isEmpty()) ?  0 : $player->backpack->count  ) *  BackpackEnum::BUFF_IN_CYCLE->value;
            $type = 'buy';

            DB::commit();
            event(new UpdateCumulativePrice($player->id, auth()->user()->id));

            return $this -> ajaxResponse(false, 'Anda berhasil mengupgrade Backpack 1 Level ', compact('dragon', 'cycle', 'backpack', 'type'));

        } catch (Exception $x){
                DB::rollBack();
                return $this->ajaxResponse(true, $x->getMessage());
        }
    }

    // Buat Beli dan Pakai Restore (Hapus debuff => ganti status ke 0 di table effects)
    // ========== YOSUA ==========
    public function buyRestore(Player $player) {
        $session = $this->checkSession();
        if (!$session) return $this->ajaxResponse(true, "Game Besar Belum Dibuka!");
        $cost = RestoreEnum::DEFAULT_PRICE->value;

        DB::beginTransaction();
        try {
//            if($player->cycle < $cost + $player->restore * RestoreEnum::CUMULATIVE_PRICE->value) return $this->ajaxResponse(true, "Cycle anda tidak mencukupi untuk membeli Restore Potion!");
            if(($player->cycle - ( $cost + $player->restore * RestoreEnum::CUMULATIVE_PRICE->value)) < 100) return $this->ajaxResponse(true, "Cycle anda tidak mencukupi untuk membeli Restore Potion!");
            $player->update([
                'cycle' => $player->cycle - ( $cost + $player->restore * RestoreEnum::CUMULATIVE_PRICE->value),
                'restore' => $player->restore +1
            ]);

            MarketLog::create([
                'player_id' => $player->id,
                'desc' => $player->team->name . "membeli 1 Restore Potion",
                'cycle' =>  $cost + $player->restore * RestoreEnum::CUMULATIVE_PRICE->value,
            ]);

            $player->debuffs()->wherePivot('status', 1) -> update([
                'status' => 0
            ]);

            $dragon = Dragon::where('threshold' , '<=', $player->cycle)
                                                ->orderBy('id', 'DESC')->first()->name;
            $cycle = $player->cycle;
            $backpack = 1000 +(  ($player -> backpack()->get()->isEmpty()) ?  0 : $player->backpack->count  ) *  BackpackEnum::BUFF_IN_CYCLE->value;
            $type = 'buy';

            DB::commit();

            // Call Pusher
            // Debuff Count
            $debuffCount = $player->debuffs()->wherePivot('status', 1)->count();
            event(new UpdateDebuff(auth()->user()->id, $debuffCount));
            event(new UpdateCumulativePrice($player, auth()->user()->id));

            return $this -> ajaxResponse(false, 'Anda berhasil membeli Restore Potion ', compact('dragon', 'cycle', 'backpack', 'type'));

        } catch (Exception $x){
                DB::rollBack();
                return $this->ajaxResponse(true, $x->getMessage());
        }
    }
}
