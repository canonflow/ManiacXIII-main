<?php

namespace App\Http\Controllers\Acara;

use App\Http\Controllers\Controller;
use App\Models\RallyGame;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    public function index() {
        $rallyGames = RallyGame::all();
        return view('acara.dashboard.index', compact('rallyGames'));
    }
}
