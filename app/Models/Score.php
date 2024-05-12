<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'rally_game_id',
        'player_id',
        'point_id'
    ];

    public function rallyGame() : BelongsTo {
        return $this->belongsTo(RallyGame::class, 'rally_game_id');
    }

    public function player() : BelongsTo {
        return $this->belongsTo(Player::class, 'player_id');
    }

    public function point() : BelongsTo {
        return $this->belongsTo(Point::class, 'point_id');
    }
}
