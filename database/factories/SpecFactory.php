<?php

namespace Database\Factories;

use App\Enums\Specs\SpecStatuses;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Spec>
 */
class SpecFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'description' => $this->faker->text(50),
            'education' => $this->faker->text(50),
            'experience' => rand(1, 10),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'spec_status' => SpecStatuses::ACTIVE
        ];
    }
}
