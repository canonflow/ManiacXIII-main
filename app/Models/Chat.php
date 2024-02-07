<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Admin;
use App\Models\Message;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'message',
        'is_from_admin',
        'message_id',
        'status'
    ];

    public function admin() : BelongsTo {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function message() : BelongsTo {
        return $this->belongsTo(Message::class, 'message_id');
    }
}
