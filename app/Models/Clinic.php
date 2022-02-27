<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'status', 'found', 'phone', 'address'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
