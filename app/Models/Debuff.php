<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Debuff extends Model
{
    use HasFactory;

    protected $table = 'debuffs';

    protected $fillable = [
        'session_id'
    ];

    public function gameBesarSession() : BelongsTo {
        return $this->belongsTo(GameBesarSession::class, 'session_id');
    }

    public function players() : BelongsToMany {
        return $this->belongsToMany(
            Player::class,
            'effects',
            'debuff_id',
            'player_id'
        )
            ->withPivot(['status'])
            ->withTimestamps();
    }
}
