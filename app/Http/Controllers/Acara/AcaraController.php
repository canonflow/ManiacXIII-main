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
                                ->paginate(10);
        $registeredPenpos = RallyGame::all()->pluck('user_id');
        $penpos = User::where('role', 'penpos')
                        ->whereNotIn('user', $registeredPenpos)
                        ->get();
//        dd($penpos);
        return view('acara.dashboard.index', compact('rallyGames', "penpos"));
    }

    public function addRallyGames(Request $request) {
        
    }
}
