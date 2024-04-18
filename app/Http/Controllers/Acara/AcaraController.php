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
        $rg = RallyGame::create([
            'name' => $request->get('name'),
            'type' => $request->get('type'),
            'user_id' => $request->get('user_id')
        ]);

        return redirect()->back()->with('success', $rg->name);
    }

    public function rallyDetail(RallyGame $rallyGame) {
        $registeredPenpos = RallyGame::where('user_id', "!=", $rallyGame->user_id)
                                    ->get()
                                    ->pluck('user_id');
        $originalPenpos = $rallyGame->user_id;
        $availablePenpos = User::where('role', 'penpos')
                                ->whereNotIn('id', $registeredPenpos)
                                ->get();
        return response()->json(
            compact('originalPenpos', 'availablePenpos', 'rallyGame'),
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
        $rallyGame->update([
            'name' => $request->get('name'),
            'type' => $request->get('type'),
            'user_id' => $request->get('user_id')
        ]);


        return redirect()->back()->with('editSuccess', $rallyGame->name);
    }

    public function rally(RallyGame $rallyGame) {
        $players = $rallyGame->players()->orderBy('created_at', 'DESC')->get();

        return view('acara.dashboard.rally', compact('rallyGame', 'players'));
    }

    public function destroy(RallyGame $rallyGame) {
        $rgName = $rallyGame->name;
        $rallyGame->delete();
        return redirect()->back()->with('deleteSuccess', $rgName);
    }
}
