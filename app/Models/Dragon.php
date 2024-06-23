<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dragon extends Model
{
    use HasFactory;

    protected $table = 'dragons';

    protected $fillable = [
        'name',
        'threshold',
        'img_url'
    ];

    public function histories() : HasMany {
        return $this->hasMany(History::class, 'dragon_id');
    }
}
