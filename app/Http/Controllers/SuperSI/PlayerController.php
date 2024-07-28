<?php

namespace App\Http\Controllers\SuperSI;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Score;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $dummy = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19 ,20];
        $players = Player::whereNotIn('id', $dummy)
                        ->get();
        return view('supersi.player.index', compact('players'));
    }

    public function log(Player $player)
    {
        $logs = $player->logs()->orderBy("created_at", 'DESC')
            ->paginate(10);
//        dd($logs);
        return view('supersi.player.log', compact('player', 'logs'));
    }

    public function marketLog(Player $player)
    {
        $logs = $player->marketLogs()->orderBy("created_at", "DESC")->paginate(10);

        return view('supersi.player.marketlog', compact('player', 'logs'));
    }

    public function score(Player $player)
    {
        $scores = Score::where('player_id', $player->id)
                    ->paginate(10);

        return view('supersi.player.score', compact('scores'));
    }
}
