<?php

namespace Database\Factories;

use App\Enums\BlogStatuses;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
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
            'text' => $this->faker->text(200),
            'image' => '',
            'status' => BlogStatuses::ACTIVE
        ];
    }
}
