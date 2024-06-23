<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alpha extends Model
{
    use HasFactory;
    protected $table = 'alphas';

    protected $fillable = [
        'health',
        'img_url'
    ];
}
