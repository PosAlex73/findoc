<?php

namespace App\Models;

use App\Enums\Specs\RecordType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'spec_id', 'type', 'datetime', 'text'
    ];

    protected $attributes = [
        'text' => '',
        'type' => RecordType::SPEC,
        'spec_id' => 0
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function spec()
    {
        return $this->belongsTo(Spec::class);
    }
}
