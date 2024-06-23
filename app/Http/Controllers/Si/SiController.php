<?php

namespace App\Http\Controllers\Si;

use App\Events\UpdateGameBesar;
use App\Http\Controllers\Controller;
use App\Models\GameBesarSession;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Enums\BackpackEnum;
use App\Enums\ExtraBreathEnum;
use App\Enums\PotionEnum;
use App\Enums\PowerSkillEnum;
use App\Enums\RestoreEnum;
use App\Enums\SemifinalEnum;
use App\Enums\UltimateEnum;
use Illuminate\Support\Carbon;

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
        event(new UpdateGameBesar("PUSHER MESSAGE: TEST DARI CONTROLLER"));

        return $this->ajaxResponse(false, "Ini Response AJAX");
    }

    public function index(){
        return view('si.index');
    }

    // Buat Pilih Player (Tim)
    public function playerDetail(Player $player) {
        return response()->json(compact('player'), 200);
    }

    // ========== Nathan ==========
    public function attack(Player $player) {
        $session = $this->checkSession();

        // Kalo Belum Ada yang dibuka
        if (!$session) return $this->ajaxResponse(true, "Game Besar Belum Dibuka!");

        return $this->ajaxResponse(
            false,
            "Berhasil Menyerang Alpha dengan damage 250!"
        );

    }

    // Buat Beli dan Pakai Power Skill
    // ========== Yosua ==========
    public function powerSkillAttack(Player $player) {

    }

    // Buat Beli dan Pakai Ultimate (sekali aja)
    // ========== MA PATRICK ==========
    public function ultimateAttack(Player $player) {

    }

    // Buat Beli Potion (sekali aja)
    // ========== Nathan ==========
    public function buyPotion(Player $player) {

    }

    // Buat Beli Dragon Breath
    // ========== Yosua ==========
    public function buyDragonBreath(Player $player) {

    }

    // Buat Beli Backpack
    // ========== Ma Patrick ==========
    public function buyBackpack(Player $player) {

    }

    // Buat Beli dan Pakai Restore (Hapus debuff => ganti status ke 0 di table effects)
    // ========== Nathan ==========
    public function buyRestore(Player $player) {

    }
}
