<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contest extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'name',
        'slug',
        'open_date',
        'close_date',
        'type'
    ];

    public function author() : BelongsTo {
        return $this->belongsTo(Acara::class, 'author_id');
    }

    public function teams() : BelongsToMany {
        return $this->belongsToMany(Team::class, 'contestants', 'contest_id', 'team_id')
                    ->withPivot(['join_date'])
                    ->withTimestamps();
    }

    public function submission() : HasMany {
        return $this->hasMany(Submission::class, 'contest_id');
//        return $this->hasOne(Submission::class, 'contest_id');
    }

}
