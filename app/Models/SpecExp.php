<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecExp extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'start', 'end'
    ];

    protected $attributes = [
        'end' => 0
    ];

    public function spec()
    {
        return $this->belongsTo(Spec::class);
    }
}
