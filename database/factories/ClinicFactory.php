<?php

namespace Database\Factories;

use App\Enums\CommonStatuses;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clinic>
 */
class ClinicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(20),
            'description' => $this->faker->text(50),
            'status' => CommonStatuses::ACTIVE,
            'found' => $this->faker->year(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address()
        ];
    }
}
