<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Point extends Model
{
    use HasFactory;

    protected $fillable = [
        'point',
        'type',
        'condition'
    ];

    public function scores() : HasMany {
        return $this->hasMany(Score::class, 'point_id');
    }
}
