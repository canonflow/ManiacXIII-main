<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Backpack extends Model
{
    use HasFactory;

    protected $table = 'backpacks';

    protected $fillable = [
        'player_id',
        'count'
    ];

    public function player() : BelongsTo {
        return $this->belongsTo(Player::class, 'player_id');
    }
}
