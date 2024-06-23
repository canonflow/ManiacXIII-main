<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MarketLog extends Model
{
    use HasFactory;

    protected $table = 'marketlogs';

    protected $fillable = [
        'player_id',
        'desc',
        'cycle'
    ];

    public function player() : BelongsTo {
        return $this->belongsTo(Player::class, 'player_id');
    }
}
