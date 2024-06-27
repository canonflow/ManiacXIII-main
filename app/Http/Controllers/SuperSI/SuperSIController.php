<?php

namespace App\Http\Controllers\SuperSI;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\Point;
use App\Models\RallyGame;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuperSIController extends Controller
{
    public function index()
    {
        $rallyGames = RallyGame::orderBy('created_at', "DESC")
                            ->paginate(8);
        return view('supersi.rally.index', compact('rallyGames'));
    }

    public function rallyDetail(RallyGame $rallyGame)
    {
        $scores = $rallyGame->scores()
            ->with('point')  // Eager Loading to increase performance of query
            ->join('points', 'scores.point_id', '=', 'points.id')
            ->select('scores.*', 'points.point')
            ->orderBy('scores.updated_at', 'DESC')
            ->paginate(10);
//            ->get();
//        dd($scores);

        $points = Point::where('type', $rallyGame->type)
                    ->get();

        return view('supersi.rally.rally', compact('rallyGame', 'scores', 'points'));
    }

    public function updateScore(RallyGame $rallyGame, Score $score, Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'point_id' => ['required']
            ]);

            $rally = $rallyGame->name;
            $player = $score->player;

            // Update Player Dragon Breath
            $currDb = $player->dragon_breath;
            $type = $rallyGame->type;
            $prevState = $score->point->condition;
            $newState = Point::find($request->get('point_id'))->condition;
            $newDb = $currDb + Score::getExchangeDragonBreath((string)$type, (string)$prevState, (string)$newState);

            // Update Player Cycle
            $currCycle = $player->cycle;
            $currPoint = $score->point->point;
            $newPoint = Point::find($request->get('point_id'))->point;

            $newCycle = $currCycle + ($newPoint - $currPoint);

            $score->update([
                'point_id' => $request->get('point_id')
            ]);

            $player->update([
                'dragon_breath' => $newDb,
                'cycle' => $newCycle
            ]);

            // Add Log
            Log::create([
                'player_id' => $player->id,
                'desc' => "<strong>Super SI</strong> (" . $rally .") Mengupdate Score menjadi <strong>" . $newPoint . "</strong> milik Tim <strong>" . $player->team->name . "</strong>."
            ]);

            DB::commit();

            return back()->with('updateSuccess', "Berhasil meng-update Score untuk Tim <strong>" . $player->team->name . "</strong> pada Pos <strong>" . $rally . "</strong>");
        } catch (\Exception $x) {
            DB::rollBack();
            return back()->with("error", $x->getMessage());
        }

    }

    public function deleteScore(RallyGame $rallyGame, Score $score)
    {
        DB::beginTransaction();
        try {
            $rally = $rallyGame->name;
            $player = $score->player;

            // Update Player Dragon Breath
            $currDb = $player->dragon_breath;
            $type = $rallyGame->type;
            $state = $score->point->condition;
            $newDb = $currDb - Score::getDeleteDragonBreath((string)$type, (string)$state);

            // Update Player Cycle
            $currCycle = $player->cycle;
            $currPoint = $score->point->point;

            $newCycle = $currCycle - $currPoint;

            $player->update([
                'dragon_breath' => $newDb,
                'cycle' => $newCycle
            ]);
            $score->delete();

            // Add Log
            Log::create([
                'player_id' => $player->id,
                'desc' => "<strong>Super SI</strong> (" . $rally .") Menghapus Score milik Tim <strong>" . $player->team->name . "</strong>."
            ]);

            DB::commit();

            return back()->with('deleteSuccess', "Berhasil menghapus Score untuk Tim <strong>" . $player->team->name . "</strong> pada Pos <strong>" . $rally . "</strong>");
        } catch (\Exception $x) {
            DB::rollBack();
            return back()->with("error", $x->getMessage());
        }
    }

    
}
