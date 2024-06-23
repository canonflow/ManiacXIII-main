<?php

namespace App\Http\Controllers\Si;

use App\Http\Controllers\Controller;
use App\Models\GameBesarSession;
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
    public function responseAjax($isError, $msg, $haystack = [], $status = 200) {
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
    }

    public function index(){
        return view('si.index');
    }

    public function attack() {
        $session = $this->checkSession();

        // Kalo Belum Ada yang dibuka
        if (!$session) return $this->responseAjax(true, "Game Besar Belum Dibuka!");

        dd($session);

    }
}
