<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'school_name',
        'school_address',
        'school_number',
        'status',
        'user_id',
        'payment_photo',
    ];

    public function participants() : HasMany {
        return $this->hasMany(Participant::class, 'team_id');
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function message() : HasOne {
        return $this->hasOne(Message::class, 'team_id');
    }

    public function contests() : BelongsToMany {
        return $this->belongsToMany(Contest::class, 'contestants', 'team_id', 'contest_id')
                    ->withPivot(['join_date'])
                    ->withTimestamps();
    }

    public function submissions() : HasMany {
        return $this->hasMany(Submission::class, 'team_id');
    }
}
