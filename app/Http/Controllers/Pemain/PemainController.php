<?php

namespace App\Http\Controllers\Pemain;

use App\Http\Controllers\Controller;
use App\Models\Contest;
use App\Models\Participant;
use App\Models\Submission;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Policies\PemainPolicy;

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

        $upcomingContest = Contest::join('contestants', 'contestants.contest_id', '=', 'contests.id')
                                    ->where('open_date', '>=', Carbon::now())
                                    ->where('team_id', '=', Auth::user()->team->id)
                                    ->get();

        $finishedContest = Contest::join('contestants', 'contestants.contest_id', '=', 'contests.id')
                                    ->where('close_date', '<=', Carbon::now())
                                    ->where('team_id', '=', Auth::user()->team->id)
                                    ->get();

        //dd($availableContest);
        return view('pemain.contest', array(
            'available_contests' => $availableContest,
            'upcoming_contests' => $upcomingContest,
            'finished_contests' => $finishedContest,
        ));
    }

    public function submission(Contest $contest)
    {
        // ===== Policy =====
        // Kalo Team gk terdaftar pada contest
        // Ini gk pake Gate soalnya gtw knapa gk isa :((
        if (!(new PemainPolicy())->access(Auth::user(), $contest)) {
            return view('pemain.unauthorized');
        }

        // ===== Time =====
        // Check if the current date is less than close date
        if ($contest->close_date < Carbon::now()) {
            return view('pemain.close-contest');
        }

        // Check if the current date is more than open date
        if ($contest->open_date > Carbon::now()) {
            return view('pemain.no-open-contest');
        }

        $team = Auth::user()->team;

        if (!($team->contests()->where('contest_id', $contest->id)->first()->pivot->join_date)) {
            // Update Join Date
            $team->contests()->syncWithoutDetaching(
                [$contest->id => ['join_date' => Carbon::now()]]
            );
        }

        return view('pemain.submission', compact('contest'));
    }

    public function submitLink(Contest $contest, Request $request)
    {
        $request->validate([
            'link' => ['required']
        ]);

        $team = Auth::user()->team;
        $link = $request->get('link');
        $submission = Submission::where('contest_id', $contest->id)
                            ->where('team_id', $team->id)
                            ->get();

        if (count($submission) == 0) {
            Submission::create([
                'contest_id' => $contest->id,
                'team_id' => $team->id,
                'link' => $link
            ]);
        } else {
            $submission[0]->link = $link;
            $submission[0]->save();
        }

        return redirect()->back()->with('success', "Berhasil menyimpan link!");
    }

    public function upload(Request $request) {
//        dd($request->all()['bukti_pembayaran']);
        $request->validate([
            'bukti_pembayaran' => ['required', 'file', 'max:10240', 'mimes:jpeg,jpg,png']
        ]);

        $team = Team::where('user_id', Auth::user()->id)->first();
        $buktiPembayaran = 'bukti_pembayaran.' . $request->file('bukti_pembayaran')->getClientOriginalExtension();
        $request->file('bukti_pembayaran')
            ->storeAs(
                $team->name . '/buktiPembayaran',
                $buktiPembayaran,
                'public'
            );

        // Ganti status & save bukti pembayaran
        $team->status = 'unverified';
        $team->payment_photo = $team->name . '/buktiPembayaran/' . $buktiPembayaran;
        $team->save();

        return redirect()->back();

    }
}
