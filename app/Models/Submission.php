<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'contest_id',
        'team_id',
        'link',
        'score'
    ];

    public function team() : BelongsTo {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function contest() : BelongsTo {
        return $this->belongsTo(Contest::class, 'contest_id');
    }
}
