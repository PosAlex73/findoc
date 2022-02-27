<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'description', 'education', 'experience', 'phone', 'address', 'spec_status'
    ];

    protected $attributes = [
        'user_id' => 0
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function records()
    {
        return $this->hasMany(Appointment::class);
    }

    public function exp()
    {
        return $this->hasMany(SpecExp::class);
    }
}
