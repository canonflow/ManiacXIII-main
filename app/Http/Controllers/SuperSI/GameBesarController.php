<?php

namespace App\Http\Controllers\SuperSI;

use App\Http\Controllers\Controller;
use App\Models\Alpha;
use App\Models\GameBesarSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class GameBesarController extends Controller
{
    public function index()
    {
        $sessions = GameBesarSession::all();
        $alpha = Alpha::first();
        return view('supersi.gamebesar.index', compact('sessions', 'alpha'));
//        return view('visitor.welcome');
    }

    public function sessionDetail(GameBesarSession $session)
    {
        return view('supersi.gamebesar.session', compact('session'));
    }

    public function addSession(Request $request)
    {
        $request->validate([
            'max_team' => ['required'],
            'multiplier' => ['required'],
            'open' => ['required'],
            'close' => ['required'],
        ]);

//        dd($request->all());
        try {
            DB::beginTransaction();

            $open = strtotime($request->get('open'));
            $close = strtotime($request->get('close'));

            $openDate = date("Y-m-d H:i", $open);
            $closeDate = date("Y-m-d H:i", $close);

            GameBesarSession::create([
                'max_team' => $request->get('max_team'),
                'multiplier' => $request->get('multiplier'),
                'open' => $openDate,
                'close' => $closeDate
            ]);

            DB::commit();

            return back()->with('addSuccess', "Berhasil menambahkan Sesi baru!");
        } catch (\Exception $x) {
            DB::rollBack();
            return back()->with('error', $x->getMessage());
        }
    }

    public function updateSession(GameBesarSession $session, Request $request)
    {
        $request->validate([
            'max_team' => ['required'],
            'multiplier' => ['required'],
            'open' => ['required'],
            'close' => ['required'],
        ]);
        DB::beginTransaction();
        try {
            $open = strtotime($request->get('open'));
            $close = strtotime($request->get('close'));

            $openDate = date("Y-m-d H:i", $open);
            $closeDate = date("Y-m-d H:i", $close);

            $session->update([
                'max_team' => $request->get('max_team'),
                'multiplier' => $request->get('multiplier'),
                'open' => $openDate,
                'close' => $closeDate
            ]);

            DB::commit();
            return back()->with('updateSuccess', "Berhasil meng-update Sesi Game Besar!");
        } catch (\Exception $x) {
            DB::rollBack();
            return back()->with('error', $x->getMessage());
        }
    }

    public function updateAlpha(Request $request)
    {
        $request->validate([
            'alpha_id' => ['required'],
            'health' => ['required']
        ]);

        DB::beginTransaction();
        try {
            $alpha = Alpha::find($request->get('alpha_id'));

            if ($alpha) $alpha->update(['health' => $request->get('health')]);
            else Alpha::create([
                'health' => $request->get('alpha_id'),
                'img_url' => "SDSD"
            ]);

            DB::commit();

            \session()->flash('tab', 'alpha');

            return back()->with('updateSuccess', "Berhasil meng-update Alpha!");
        } catch (\Exception $x) {
            DB::rollBack();
            return back()->with('error', $x->getMessage());
        }
    }
}
