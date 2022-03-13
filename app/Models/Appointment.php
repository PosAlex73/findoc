<?php

namespace App\Models;

use App\Enums\Specs\RecordType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'spec_id', 'type', 'datetime', 'text'
    ];

    protected $attributes = [
        'text' => '',
        'type' => RecordType::SPEC,
        'spec_id' => 0,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function spec()
    {
        return $this->belongsTo(Spec::class);
    }

    protected function dateTime(): Attribute
    {
        return Attribute::make(
            set: function($value) {
                return (new \DateTime($value));
            }
        );
    }
}
