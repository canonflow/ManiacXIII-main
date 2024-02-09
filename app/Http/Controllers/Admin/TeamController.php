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

        // Kalo parameter status tidak termasuk yg diminta -> abort
        if (count(array_intersect($status, $listStatus)) != count($status)) abort(404);

        $teams = Team::where('status', '!=', 'deactivated')
                    ->whereIn('status', $status)
                    ->orderBy('id', 'DESC')
                    ->paginate(10);

        return view('admin.registration.index', compact('teams'));
    }

    public function search(Request $request) {
        //dd($request->get('status'));
//        $request->validate([
//            'search' => 'required',
//            'name' => 'required'
//        ]);

        $status = $request->get('status');
        $search = $request->get('search');
        $name = $request->get('name');
        $listStatus = ['verified', 'unverified', 'waiting'];
        $listSearch = ['teams.name', 'participants.name', 'teams.school_name'];

        // Kalo parameter status tidak termasuk yg diminta -> abort / kosong
        if ($status == null) abort(404);

        if (count(array_intersect($status, $listStatus)) != count($status)) abort(404);

        // Kalo parameter search tidak ada di list
        if (!in_array($search, $listSearch)) abort(404);

        $teams = Team::select("teams.*")
                    ->distinct()
                    ->join('participants', 'participants.team_id', '=', 'teams.id')
                    ->where("$search", 'LIKE', "%$name%")
                    ->orderBy('teams.id', 'DESC')
                    ->whereIn("teams.status", $status)
                    ->orderBy('teams.id', 'DESC')
                    ->paginate(10);

        session()->flash('name', $name);

        return view('admin.registration.index', compact('teams'));

    }
}
