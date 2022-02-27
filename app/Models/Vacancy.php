<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'text', 'category_id', 'status'
    ];

    protected $attributes = [
        'category_id' => 0
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
