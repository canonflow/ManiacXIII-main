<?php

namespace App\Http\Controllers\Penpos;

use App\Enums\BackpackEnum;
use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Player;
use App\Models\Point;
use App\Models\RallyGame;
use App\Models\Score;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use const http\Client\Curl\AUTH_ANY;

class PenposController extends Controller
{
    public function index() {
        $points = Point::where('type', Auth::user()->rallyGame->type)->get();
        $scores = Score::where('rally_game_id', Auth::user()->rallyGame->id)
            ->orderBy('created_at', 'DESC')
            ->get();
//        dd($scores);
        return view('penpos.index', compact('points', 'scores'));
    }

    public function store(Request $request) {
        $request->validate([
            'tim' => ['required'],
            'point_id' => ['required']
        ]);
        try {
            DB::beginTransaction();
            $msg = 'NO';

            // Cari Player dan Point (Cari tim dlu baru player)
            $team = Team::where('name', $request ->get('tim'))->first();
            $player = Player::where('team_id', $team -> id)->first();
            $point = Point::find($request -> get('point_id'));

            $desc = "Berhasil menambahkan poin ke Tim " . $team->name;

            // Cek Apakah Tim sudah pernah main (udah ada poin-nya), klo iya langsung return aja
            $flag = Score::where('player_id', $player-> id)->where('rally_game_id', Auth::user()->rallyGame ->id)->get();
            if (count($flag) != 0)
            {
                $msg = "YES";
                return response()->json(compact('msg'), 200);
            }

            // Buat Score
            $score = Score::create([
                'rally_game_id' => Auth::user()->rallyGame->id,
                'player_id' => $player->id,
                'point_id' => $point->id
            ]);

//            if ($point->condition == 'full')
//            {
//                $player->dragon_breath = $player -> dragon_breath + 1;
//            }

            $logDesc = "<strong>" . Auth::user()->username . "</strong> (" . Auth::user()->rallyGame->name . ") Menambahkan Score sebanyak <strong>" . $point->point . "</strong> ke Tim <strong>" . $player->team->name . "</strong>.";

            // Tambah Dragon Breath
            $db = $player->dragon_breath + Score::getAddDragonBreath(Auth::user()->rallyGame->type, $point->condition);

            // Tambah Cycle
            $cycle = $player->cycle + $point->point;

            // Cek apakah punya potion
            if (!$player->potion()->get()->isEmpty()) {
                $cycle += $point->point * 0.5;
                $desc .= " (POTION ACTIVATED)";
                $logDesc .= " (POTION ACTIVATED)";
            }

            // Cek apakah melebih batas backpak
            $max = 1000 + (($player->backpack()->get()->isEmpty()) ?  0 : $player->backpack->count  ) *  BackpackEnum::BUFF_IN_CYCLE->value;
            if ($cycle > $max) $cycle = $max;

            // Update Player
            $player->update([
                'dragon_breath' => $db,
                'cycle' => $cycle
            ]);

            $scores = RallyGame::getPenposScores(Auth::user()->rallyGame->id);

            // Add Log
            Log::create([
                'player_id' => $player->id,
                'desc' => $logDesc
            ]);

            DB::commit();

            return response()->json([
                'team' => $team->name,
                'point' => $point->point,
                'msg' => $msg,
                'scores' => $scores,
                'desc' => $desc
            ], 200);
        } catch (\Exception $x) {
            DB::rollBack();
//            $desc = $x->getMessage();
            return response()->json(compact('msg'), 200);
        }
    }

    public function destroy(Score $score) {
        DB::beginTransaction();
        try {
            $team = $score->player->team->name;
            $player = $score->player;

            $type = $score->rallyGame->type;
            $state = $score->point->condition;
            $desc = 'Berhasil Menghapus Score untuk Tim ' . $team;
            $logDesc = "<strong>" . Auth::user()->username . "</strong> (" . Auth::user()->rallyGame->name . ") Mengurangi Score sebanyak <strong>" . $score->point->point . "</strong> ke Tim <strong>" . $player->team->name . "</strong>.";

            // Update Cycle
            $cycle = $player->cycle - $score->point->point;

            // Kalo ada Potion
            if (!$player->potion()->get()->isEmpty()) {
                $cycle -= $score->point->point * 0.5;
                $desc .= " (POTION ACTIVATED)";
                $logDesc .= " (POTION ACTIVATED)";
            }

            if ($cycle < 0) $cycle = 0;

            // Update Dragon Breath
            $db = $player->dragon_breath - Score::getDeleteDragonBreath((string)$type, (string)$state);

            // Update Player
            $player->update([
                'dragon_breath' => $db,
                'cycle' => $cycle
            ]);

            // Hapus
            $score->delete();

            // Ambil semua score
            $scores = RallyGame::getPenposScores(Auth::user()->rallyGame->id);

            // Add Log
            Log::create([
                'player_id' => $player->id,
                'desc' => $logDesc
            ]);

            DB::commit();

            return response()->json([
                'msg' => $desc,
                'scores' => $scores,
            ], 200);
        } catch (\Exception $x) {
            DB::rollBack();
            $scores = RallyGame::getPenposScores(Auth::user()->rallyGame->id);
            return response()->json([
                'msg' => $x->getMessage(),
                'scores' => $scores
            ], 200);
        }
    }
}
