<?php

namespace App\Models;

use App\Http\Requests\Blog\StoreBlogRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'text', 'image', 'status', 'category_id'
    ];

    protected $attributes = [
        'image' => ''
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getShortDescriptionAttribute()
    {
        return substr($this->text, 0,15);
    }

    public function saveImage(StoreBlogRequest $request)
    {
        if ($request->exists('image')) {
            $image = Storage::putFile('public/images/articles/' . $this->id, $request->file('image'));
            $image = pathinfo($image, PATHINFO_BASENAME);
            $this->update(['image' => $image]);
        }
    }
}
