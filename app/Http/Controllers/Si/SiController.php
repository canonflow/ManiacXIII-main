<?php

namespace App\Http\Controllers\Si;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enums\BackpackEnum;
use App\Enums\ExtraBreathEnum;
use App\Enums\PotionEnum;
use App\Enums\PowerSkillEnum;
use App\Enums\RestoreEnum;
use App\Enums\SemifinalEnum;
use App\Enums\UltimateEnum;

class SiController extends Controller
{
    public function responseAjax($isError, $msg, $haystack) {
        $response = [
            'isError' => $isError,
            'msg' => $msg
        ];

        if (count($haystack) != 0) {
            foreach ($haystack as $key => $value) {
                $response += [$key => $value];
            }
        }

        return response()->json($response, 200);
    }

    public function index(){
        return view('si.index');
    }
}
