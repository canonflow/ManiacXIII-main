<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class History extends Model
{
    use HasFactory;

    protected $table = 'histories';

    protected $fillable = [
        'dragon_id',
        'session_id',
        'player_id',
        'total_damage',
        'damage'
    ];

    public function dragon() : BelongsTo {
        return $this->belongsTo(Dragon::class, 'dragon_id');
    }

    public function player() : BelongsTo {
        return $this->belongsTo(Player::class, 'player_id');
    }

    public function gameBesarSession() : BelongsTo {
        return $this->belongsTo(GameBesarSession::class, 'session_id');
    }
}
