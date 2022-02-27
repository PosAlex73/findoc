<?php

namespace Database\Factories;

use App\Enums\Reviews\ReviewTypes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SpecReview>
 */
class SpecReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => ReviewTypes::VISIBLE,
            'rating' => rand(1, 5),
            'text' => $this->faker->text(200)
        ];
    }
}
