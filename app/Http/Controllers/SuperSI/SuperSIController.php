<?php

namespace App\Http\Controllers\SuperSI;

use App\Http\Controllers\Controller;
use App\Models\Contest;
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

    public function leaderboard(Request $request)
    {
        $contests = Contest::all();
        $leaderboard = DB::select(
            "WITH total_damage AS (
    SELECT
        player_id,
        SUM(total_damage) AS total_damage_sum
    FROM
        histories
    GROUP BY
        player_id
),
max_damage AS (
    SELECT
        MAX(total_damage_sum) AS gt
    FROM
        total_damage
),
gamebes AS (
    SELECT
        td.player_id,
        md.gt,
        IFNULL(td.total_damage_sum / md.gt * 40, 0) AS jtd
    FROM
        total_damage td
    CROSS JOIN
        max_damage md
)
SELECT
    t.name,
    IFNULL(ROUND(SUM(tp.tp_score + jpm.full_condition + jpm.all_condition), 3), 0) AS rally,
    IFNULL(ROUND(MAX(gamebes.jtd), 3), 0) AS gamebesar,
    IFNULL(ROUND(SUM(tp.tp_score + jpm.full_condition + jpm.all_condition), 3), 0) + IFNULL(ROUND(MAX(gamebes.jtd), 3), 0) AS total_score
FROM
    teams AS t
JOIN
    players AS p ON p.team_id = t.id
LEFT JOIN (
    -- Total Point
    SELECT
        s.player_id,
        IFNULL(SUM(pt.point) / 2400 * 30, 0) AS tp_score
    FROM
        scores AS s
    INNER JOIN
        points AS pt ON s.point_id = pt.id
    GROUP BY
        s.player_id
) AS tp ON tp.player_id = p.id
LEFT JOIN (
    -- Jumlah Pos Menang and Jumlah Pos Yang Dimainkan
    SELECT
        s.player_id,
        IFNULL(COUNT(CASE WHEN pt.condition = 'full' THEN s.id END) / 16 * 20, 0) AS full_condition,
        IFNULL(COUNT(s.id) / 16 * 10, 0) AS all_condition
    FROM
        scores AS s
    INNER JOIN
        points AS pt ON s.point_id = pt.id
    GROUP BY
        s.player_id
) AS jpm ON jpm.player_id = p.id
LEFT JOIN gamebes ON gamebes.player_id = p.id
GROUP BY
    t.name
ORDER BY
	total_score DESC,
    rally DESC,
    gamebesar DESC,
    t.id ASC;"
        );
//        dd($leaderboard);
        return view('supersi.leaderboard.index', compact('leaderboard', 'contests'));
    }

    public function summarize(Request $request)
    {
//        $contest = Contest::get()[0];
        $contest = Contest::find($request->get('contest_id'));
        DB::statement("SET SQL_MODE=''");
        $scores = DB::select(
            "WITH total_damage AS (
    SELECT
        player_id,
        SUM(total_damage) AS total_damage_sum
    FROM
        histories
    GROUP BY
        player_id
),
max_damage AS (
    SELECT
        MAX(total_damage_sum) AS gt
    FROM
        total_damage
),
gamebes AS (
    SELECT
        td.player_id,
        md.gt,
        IFNULL(td.total_damage_sum / md.gt * 40, 0) AS jtd
    FROM
        total_damage td
    CROSS JOIN
        max_damage md
)
SELECT
    t.name as 'Nama Tim',
    IFNULL(s.score * 0.6, 0) AS 'Nilai Penyisihan',
    (IFNULL(ROUND(SUM(tp.tp_score + jpm.full_condition + jpm.all_condition), 3), 0) + IFNULL(ROUND(MAX(gamebes.jtd), 3), 0)) * 0.4 AS 'Nilai Semifinal',
    IFNULL(
    	IFNULL(s.score * 0.6, 0) +
    	(IFNULL(ROUND(SUM(tp.tp_score + jpm.full_condition + jpm.all_condition), 3), 0) + IFNULL(ROUND(MAX(gamebes.jtd), 3), 0)) * 0.4
    , 0) AS 'Final Score'
FROM
    teams AS t
JOIN
    players AS p ON p.team_id = t.id
LEFT JOIN
	submissions AS S ON t.id = s.team_id
LEFT JOIN (
    -- Total Point
    SELECT
        s.player_id,
        IFNULL(SUM(pt.point) / 2400 * 30, 0) AS tp_score
    FROM
        scores AS s
    INNER JOIN
        points AS pt ON s.point_id = pt.id
    GROUP BY
        s.player_id
) AS tp ON tp.player_id = p.id
LEFT JOIN (
    -- Jumlah Pos Menang and Jumlah Pos Yang Dimainkan
    SELECT
        s.player_id,
        IFNULL(COUNT(CASE WHEN pt.condition = 'full' THEN s.id END) / 16 * 20, 0) AS full_condition,
        IFNULL(COUNT(s.id) / 16 * 10, 0) AS all_condition
    FROM
        scores AS s
    INNER JOIN
        points AS pt ON s.point_id = pt.id
    GROUP BY
        s.player_id
) AS jpm ON jpm.player_id = p.id
LEFT JOIN gamebes ON gamebes.player_id = p.id
WHERE s.contest_id = $contest->id
GROUP BY
    t.name
ORDER BY
	'Final Score' DESC,
	'Nilai Penyisihan' DESC,
	'Nilai Semifinal' DESC,
    t.id ASC;"
        );

//        dd($scores);

        return response()->json(compact('scores'), 200);
    }

}
