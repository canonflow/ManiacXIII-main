<?php

namespace App\Http\Controllers\Penpos;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Point;
use App\Models\Score;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $msg = 'NO';

        // Cari Player dan Point (Cari tim dlu baru player)


        // Cek Apakah Tim sudah pernah main (udah ada poin-nya), klo iya langsung return aja

        // Buat Score

        return response()->json([
            'team' => $team->name,
            'point' => $point->point,
            'msg' => $msg
        ], 200);
    }

    public function destroy(Score $score) {
        $team = $score->player->team->name;

        // Hapus

        // Ambil semua score
        $scores = [];

        return response()->json([
            'msg' => 'Berhasil Menghapus Score untuk Tim ' . $team,
            'scores' => $scores
        ], 200);
    }
}
