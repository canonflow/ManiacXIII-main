<?php

namespace App\Http\Controllers\Pemain;

use App\Http\Controllers\Controller;
use App\Models\Contest;
use App\Models\Participant;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PemainController extends Controller
{
    public function index() {
        $team = Team::where('user_id',Auth::user()->id)->first();
        $participants = Participant::where('team_id', $team->id)->get();

        return view('pemain.dashboard', compact("team", 'participants'));
    }

    public function contest() {
        $availableContest = Contest::join('contestants', 'contestants.contest_id', '=', 'contests.id')
                                    ->where('open_date', '<=', Carbon::now())
                                    ->where('close_date', '>=', Carbon::now())
                                    ->where('team_id', '=', Auth::user()->team->id)
                                    ->get();

        //dd($availableContest);
        return view('pemain.contest', array(
            'available_contests' => $availableContest
        ));
    }
}
