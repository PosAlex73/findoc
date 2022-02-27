<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'type', 'rating', 'text'
    ];

    public function spec()
    {
        return $this->belongsTo(Spec::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
