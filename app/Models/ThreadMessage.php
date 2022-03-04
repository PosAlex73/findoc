<?php

namespace App\Models;

use App\Enums\MessageStatuses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThreadMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'message', 'status'
    ];

    protected $attributes = [
        'status' => MessageStatuses::UNREAD
    ];

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }
}
