<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RallyGame extends Model
{
    protected $table = 'rally_games';
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'type'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

//    public function players() : BelongsToMany {
//        return $this->belongsToMany(Player::class, 'rg_score', 'penpos_id', 'player_id')
//            ->withPivot(['score'])
//            ->withTimestamps();
//    }

    public function getScores() {
        /*
         * Ambil semua score berdasarkan rally game tertentu
         * urutkan berdasarkan nilai point pada table 'points' dengan DESCENDING
         *
         * Contoh Output di dalam array
         *  "id" => 1
            "rally_game_id" => 1
            "player_id" => 2
            "point_id" => 1
            "created_at" => "2024-05-12 19:54:18"
            "updated_at" => "2024-05-12 19:54:18"
            "point" => 100.0
            "type" => "single"
            "condition" => "full"
         * */
        $scores = $this->scores()
            ->with('point')  // Eager Loading to increase performance of query
            ->join('points', 'scores.point_id', '=', 'points.id')
            ->orderBy('points.point', 'DESC')
            ->get();
        return $scores;
    }

    public function scores() : HasMany {
        return $this->hasMany(Score::class, 'rally_game_id');
    }
}
