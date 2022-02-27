<?php

namespace Database\Factories;

use App\Enums\Vacancies\VacancyStatuses;
use App\Models\Vacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacancy>
 */
class VacancyFactory extends Factory
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
            'text' => $this->faker->text(),
            'status' => VacancyStatuses::ACTIVE
        ];
    }
}
