<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'status'
    ];

    public function articles()
    {
        return $this->hasMany(Blog::class);
    }

    public function vacancies()
    {
        return $this->hasMany(Vacancy::class);
    }

    public function specs()
    {
        return $this->hasMany(Category::class);
    }

    public function clinics()
    {
        return $this->belongsToMany(Clinic::class);
    }
}
