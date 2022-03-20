<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function reviews()
    {
        return $this->hasMany(SpecReview::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->lastname;
    }

    public function getAvgRatingAttribute()
    {
        $rating = DB::table('specs')
            ->join('spec_reviews', 'specs.id', '=', 'spec_reviews.spec_id')
            ->where('specs.id', '=', $this->id)
            ->avg('spec_reviews.rating');

        return round($rating, 2);
    }
}
