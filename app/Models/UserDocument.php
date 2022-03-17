<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            $path = Storage::putFile('user_documents', $request->file('path'));
            $path = pathinfo($path, PATHINFO_BASENAME);
            $this->update(['path' => $path]);
        }
    }
}
