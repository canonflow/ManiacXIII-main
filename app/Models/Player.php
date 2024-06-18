<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
