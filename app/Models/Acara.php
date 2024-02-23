<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Acara extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name'
    ];

    protected $table = 'acara';

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function contests() : HasMany {
        return $this->hasMany(Contest::class, 'author_id');
    }

}
