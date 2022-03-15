<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'notice', 'path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getShortNoticeAttribute()
    {
        return substr($this->notice, 0 ,15) . '...';
    }
}
