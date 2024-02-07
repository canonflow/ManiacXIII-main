<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Team;
use App\Models\Chat;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id'
    ];

    public function team() : BelongsTo {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function chats() : HasMany {
        return $this->hasMany(Chat::class, 'message_id');
    }
}
