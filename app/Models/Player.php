<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'cycle',
        'dragon_breath',
        'restore',
        'ultimate'
    ];

    public function team() : BelongsTo {
        return $this->belongsTo(Team::class, 'team_id');
    }

//    public function rallyGames() : BelongsToMany {
//        return $this->belongsToMany(RallyGame::class, 'rg_score', 'player_id', 'penpos_id')
//            ->withPivot(['score'])
//            ->withTimestamps();
//    }

    public function scores() : HasMany {
        return $this->hasMany(Score::class, 'player_id');
    }

    public function backpack() : HasOne {
        return $this->hasOne(Backpack::class, 'player_id');
    }

    public function marketLogs() : HasMany {
        return $this->hasMany(MarketLog::class, 'player_id');
    }

    public function histories() : HasMany {
        return $this->hasMany(History::class, 'player_id');
    }

    public function potion() : HasOne {
        return $this->hasOne(Potions::class, 'player_id');
    }

    public function gameBesarSessions() : BelongsToMany {
        return $this->belongsToMany(
            GameBesarSession::class,
            'power_up',
            'player_id',
            'session_id',
        )
            ->withTimestamps();
    }

    public function debuffs() : BelongsToMany {
        return $this->belongsToMany(
            Debuff::class,
            'effects',
            'player_id',
            'debuff_id'
        )
            ->withPivot(['status'])
            ->withTimestamps();
    }
}
