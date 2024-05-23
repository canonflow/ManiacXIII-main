<?php

namespace App\Http\Controllers\Acara;

use App\Http\Controllers\Controller;
use App\Models\RallyGame;
use App\Models\User;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    public function index() {
        $rallyGames = RallyGame::orderBy('id', 'DESC')
                                ->paginate(5);
        $registeredPenpos = RallyGame::all()->pluck('user_id');
        $penpos = User::where('role', 'penpos')
                        ->whereNotIn('id', $registeredPenpos)
                        ->get();
//        dd($penpos);
        return view('acara.dashboard.index', compact('rallyGames', "penpos"));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'unique:rally_games,name'],
            'type' => ['required'],
            'user_id' => ['required']
        ]);

        // ===== Create Rally Games =====

        return redirect()->back()->with('success', $rg->name);
    }

    public function rallyDetail(RallyGame $rallyGame) {
        // Ambil id penpos yg sudah punya Rally Game

        // Ambil id penpos dari Rally Game yang asli


        // Ambil penpos yg belum punya Rally Game

        return response()->json(
//            compact('originalPenpos', 'availablePenpos', 'rallyGame'),
            200
        );
    }

    public function update(Request $request, RallyGame $rallyGame) {
        $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'user_id' => ['required', 'integer']
        ]);

        // Update RG


        return redirect()->back()->with('editSuccess', $rallyGame->name);
    }

    public function rally(RallyGame $rallyGame) {
//        $players = $rallyGame->players()->orderBy('created_at', 'DESC')->get();
        $scores = $rallyGame->getScores();
//        dd($scores);

        return view('acara.dashboard.rally', compact('rallyGame', 'scores'));
    }

    public function destroy(RallyGame $rallyGame) {
        // Ambil Nama Rally
        $rgName = $rallyGame->name;

        // Hapus Rally

        return redirect()->back()->with('deleteSuccess', $rgName);
    }
}
