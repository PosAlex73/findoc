<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'category_id', 'description', 'education', 'experience', 'phone', 'address', 'spec_status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function records()
    {
        return $this->hasMany(Appointment::class);
    }

    public function exp()
    {
        return $this->hasMany(SpecExp::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->lastname;
    }
}
