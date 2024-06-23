<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GameBesarSession extends Model
{
    use HasFactory;

    protected $table = 'game_besar_sessions';

    protected $fillable = [
        'open',
        'close',
        'multiplier',
        'max_team'
    ];

    public function histories() : HasMany {
        return $this->hasMany(History::class, 'session_id');
    }

    public function players() : BelongsToMany {
        return $this->belongsToMany(
            Player::class,
            'power_up',
            'session_id',
            'player_id'
        )
            ->withTimestamps();
    }

    public function debuffs() : HasMany {
        return $this->hasMany(Debuff::class, 'session_id');
    }

}
