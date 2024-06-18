<?php

namespace App\Http\Controllers\Acara;

use App\Http\Controllers\Controller;
use App\Models\Contest;
use App\Models\Submission;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ContestController extends Controller
{
    public function index() {
        $availableContest = Contest::where('open_date', '<=', Carbon::now())
            ->where('close_date', '>=', Carbon::now())
            ->get();

        $upcomingContest = Contest::where('open_date', '>=', Carbon::now())
            ->get();

        $finishedContest = Contest::where('close_date', '<=', Carbon::now())
            ->get();

        //dd($availableContest);
        return view('acara.contest.index', array(
            'available_contests' => $availableContest,
            'upcoming_contests' => $upcomingContest,
            'finished_contests' => $finishedContest,
        ));
    }

    /**
     *  Show the form for creating a new Contest.
     */
    public function create() {
        return view('acara.layout.index');
    }

    /**
     * Store a newly created Contest in Database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) : RedirectResponse {
        $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'open_date' => ['required'],
            'close_date' => ['required'],
        ]);

//        dd($request);

        $open = strtotime($request->get('open_date'));
        $close = strtotime($request->get('close_date'));

        $openDate = date("Y-m-d H:i", $open);
        $closeDate = date("Y-m-d H:i", $close);

        Contest::create([
            'name' => $request->get('name'),
            'type' => $request->get('type'),
            'slug' => $this->createSlug(Auth::user()->acara->name, $request->get('name')),
            'author_id' => Auth::user()->acara->id,
            'open_date' => $openDate,
            'close_date' => $closeDate,
        ]);

        return redirect()->back()->with('addSuccess', $request->get('name'));
    }

    /**
     * Display the specified Contest.
     *
     * @param \App\Models\Contest $contest
     */
    public function show(Contest $contest) {
        // Authorization
//        if ($contest->author_id != Auth::user()->acara->id) {
//            return redirect()->back()->with('unauthorized', "Anda tidak bisa mengubah kontest yang dibuat oleh " . $contest->author->name);
//        }

        // ===== Get Contestants =====
        $contestants = $contest->teams()
                        ->orderBy('id', 'DESC')
                        ->get();

        // ===== Get Current Submissions =====
        $submissions = Submission::where('contest_id', $contest->id)
                                ->orderBy('id', "DESC")
                                ->get();

        // ===== Get Unregistered Contestant =====
        $registeredTeams = $contest->teams()->pluck('id')->toArray();
        $unregisteredTeams = Team::whereNotIn('id', $registeredTeams)
                                    ->where('status', 'verified')
                                    ->get();

        return view('acara.contest.contest',
            compact('contest', 'contestants', 'unregisteredTeams', 'submissions')
        );
    }

    public function addContestants(Contest $contest, Request $request) {
        // Validator
        $request->validate([
            'teams' => ['required']
        ]);

        // Authorization
        if ($contest->author_id != Auth::user()->acara->id) {
            return redirect()->back()->with('unauthorized', "Anda tidak bisa menambah contestant pada contest yang dibuat oleh " . $contest->author->name);
        }

        // Check if contest is available or not
        if ($contest->close_date <= Carbon::now()) {
            return redirect()->back()->with('unauthorized', 'Anda tidak bisa menambah contestant pada Contest yang telah selesai');
        }

        // Get Teams and Store Teams
        $teams = $request->get('teams');
        foreach ($teams as $id) {
            $contest->teams()->attach($id);
        }

        return redirect()->back()->with('addSuccess', "Berhasil menambahkan " . count($teams) . " Tim");
    }

    public function deleteContestant(Contest $contest, Team $team) {
        // Authorization
        if ($contest->author_id != Auth::user()->acara->id) {
            return redirect()->back()->with('unauthorized', "Anda tidak bisa mengubah kontest yang dibuat oleh " . $contest->author->name);
        }

        // Delete a Record on Many-to-Many table
        $contest->teams()->detach($team->id);

        return redirect()->back()->with('deleteSuccess', $team->name);
    }

    public function addScore(Submission $submission, Request $request) {
        $request->validate([
            'score' => ['required', 'numeric']
        ]);

        $score = $request->get('score');
        $submission->score = $score;
        $submission->save();

        return redirect()->back()->with('addScoreSuccess', 'Berhasil Menambahkan Score untuk Tim ' . $submission->team->name);

    }

    /**
     * Send data for editing the specified Contest.
     *
     * @param \App\Models\Contest $contest
     */
    public function edit(Contest $contest) {
        // Check if user is authorized
        if ($contest->author_id != Auth::user()->acara->id) {
            return response()->json(array(
                'unauthorized' => true,
            ));
        }

        return response()->json(compact('contest'));
    }

    /**
     * Update the specified Contest in Database
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Contest $contest
     * @return \Illuminate\Http\Response
     */
    public function update( Contest $contest, Request $request) : RedirectResponse {
        // Validation
        $request->validate([
            'name' => ['required'],
            'type' => ['required'],
            'open_date' => ['required'],
            'close_date' => ['required'],
        ]);

        // Check if user is authorized
        if ($contest->author_id != Auth::user()->acara->id) {
            return redirect()->back()->with('unauthorized', "Anda tidak bisa mengubah Contest yang dibuat oleh " . $contest->author->name);
        }

        // Check if contest is available or not
        if ($contest->close_date <= Carbon::now()) {
            return redirect()->back()->with('unauthorized', 'Anda tidak bisa mengubah Contest yg telah selesai');
        }

        // ===== Update =====
        $open = strtotime($request->get('open_date'));
        $close = strtotime($request->get('close_date'));

        $openDate = date("Y-m-d H:i", $open);
        $closeDate = date("Y-m-d H:i", $close);

        $contest->update([
            'name' => $request->get('name'),
            'type' => $request->get('type'),
            'open_date' => $openDate,
            'close_date' => $closeDate
        ]);

        return redirect()->back()->with('editSuccess', $contest->name);
    }

    /**
     * Remove the specified Contest from Database
     *
     * @param \App\Models\Contest $contest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contest $contest) : RedirectResponse {
        if (
            $contest->author_id != Auth::user()->acara->id ||
            Carbon::now() > $contest->close_date
        ) {
            return redirect()->back()->with('unauthorized', "Anda tidak bisa menghapus Contest yang telah selesai atau Contest yang dibuat oleh orang lain!");
        }

        $contest->delete();
        return redirect()->back()->with('deleteSuccess', $contest->name);
    }

    public function createSlug(string $author, string $contest) : string {
        return Str::slug(
            Str::lower($author) . ' ' . Str::random(10) . Str::lower($contest) . Str::random(10),
            "-"
        );
    }
}
