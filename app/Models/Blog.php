<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
