<?php

namespace App\Http\Controllers\Acara;

use App\Http\Controllers\Controller;
use App\Models\Contest;
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
//        dd($contest);
        return view('acara.contest.contest', compact('contest'));
    }

    /**
     * Show the form for editing the specified Contest.
     *
     * @param \App\Models\Contest $contest
     */
    public function edit(Contest $contest) {
        // Check if user is authorized
        if ($contest->author_id != Auth::user()->acara->id) {
            return redirect()->back()->with('unauthorized', "Anda tidak bisa mengubah kontest yang dibuat oleh " . $contest->author->name);
        }

        return view('acara.layout.index');
    }

    /**
     * Update the specified Contest in Database
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Contest $contest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contest $contest) : RedirectResponse {
        // Check if user is authorized
        if ($contest->author_id != Auth::user()->acara->id) {
            return redirect()->back()->with('unauthorized', "Anda tidak bisa mengubah kontest yang dibuat oleh " . $contest->author->name);
        }

        dd($contest);
        return redirect()->back();
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
            return redirect()->back()->with('unauthorized', "Anda tidak bisa menghapus Contest yang telah selesai!");
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
