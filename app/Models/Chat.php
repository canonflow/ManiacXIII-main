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
        'is_from_admin'
    ];

    public function admin() : BelongsTo {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function reads() : BelongsToMany {
        return $this->belongsToMany(Message::class, 'reads', 'chat_id', 'message_id')
            ->withPivot(['status'])
            ->withTimestamps();
    }
}
