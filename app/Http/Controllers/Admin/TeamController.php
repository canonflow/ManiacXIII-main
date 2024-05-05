<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    public function index(Request $request) {
        if ($request->get('status') == "") return redirect()->to(route('admin.teams.index')."?status%5B%5D=unverified&status%5B%5D=waiting&status%5B%5D=verified");

        $status = $request->get('status');
        $listStatus = ['verified', 'unverified', 'waiting'];
        $listTeamIdSandbox = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];

        // Kalo parameter status tidak termasuk yg diminta -> abort
        if (count(array_intersect($status, $listStatus)) != count($status)) abort(404);

        $teams = Team::where('status', '!=', 'deactivated')
                    ->whereIn('status', $status)
                    ->whereNotIn('id', $listTeamIdSandbox)
                    ->orderBy('id', 'DESC')
                    ->paginate(10);

        return view('admin.Registration.index', compact('teams'));
    }

    public function search(Request $request) {
        //dd($request->get('status'));
        $request->validate([
            'search' => 'required',
            'status' => 'required'
        ]);

        $status = $request->get('status');
        $search = $request->get('search');
        $name = $request->get('name');
        $listStatus = ['verified', 'unverified', 'waiting'];
        $listSearch = ['teams.name', 'participants.name', 'teams.school_name'];
        $listTeamIdSandbox = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];

        if (count(array_intersect($status, $listStatus)) != count($status)) abort(404);

        // Kalo parameter search tidak ada di list
        if (!in_array($search, $listSearch)) abort(404);

        $teams = Team::select("teams.*")
                    ->distinct()
                    ->join('participants', 'participants.team_id', '=', 'teams.id')
                    ->where("$search", 'LIKE', "%$name%")
                    ->orderBy('teams.id', 'DESC')
                    ->whereIn("teams.status", $status)
                    ->whereNotIn('id', $listTeamIdSandbox)
                    ->orderBy('teams.id', 'DESC')
                    ->paginate(10);

        session()->flash('name', $name);

        return view('admin.Registration.index', compact('teams'));
    }

    public function deactivateTeam(Request $request) {
        $team = Team::where('name', $request->get('team'))->first();
        //dd($request->get('name'));
        $team->status = 'deactivated';
        $team->save();

        return redirect()->back()->with('deactivateSuccess', "$team->name");
    }

    public function getTeamData(Request $request) {
        $team = Team::with('participants')->find($request->get('team_id'));

        return response()->json(compact('team'));
    }

    public function verificationTeam(Team $team, Request $request) {
        if ($team->status == 'verified') {
            return redirect()->back()->with('unsuccessful', 'Tim sudah terverifikasi!');
        }

        if ($team->payment_photo == null) {
            return redirect()->back()->with('unsuccessful', 'Tim belum mengunggah bukti pembayaran!');
        }

        $team->status = 'verified';
        $team->save();
        return redirect()->back()->with('successful', 'Tim ' . $team->name . ' berhasil terverifikasi');
//        dd($team);
    }

    public function unverifiedTeam(Team $team, Request $request) {
        if ($team->status == 'unverified') {
            return redirect()->back()->with('unsuccessful', 'Tim belum terverifikasi!');
        }

        if ($team->payment_photo == null) {
            return redirect()->back()->with('unsuccessful', 'Tim belum mengunggah bukti pembayaran!');
        }

        $team->status = 'unverified';
        $team->save();
        return redirect()->back()->with('successful', 'Berhasil unverified tim ' . $team->name);
//        dd($team);
    }
}
