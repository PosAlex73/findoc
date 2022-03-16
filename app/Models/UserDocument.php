<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UserDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'notice', 'path'
    ];

    protected $attributes = [
        'path' => ''
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getShortNoticeAttribute()
    {
        return substr($this->notice, 0 ,15) . '...';
    }

    public function saveFile(Request $request)
    {
        if ($request->exists('path')) {
            $path = $request->file('path')->store('user_documents');
            $this->update(['path' => $path]);
        }
    }
}
