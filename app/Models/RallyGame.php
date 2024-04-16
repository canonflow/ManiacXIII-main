<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function players() : BelongsToMany {
        return $this->belongsToMany(Player::class, 'rg_score', 'penpos_id', 'player_id');
    }
}
