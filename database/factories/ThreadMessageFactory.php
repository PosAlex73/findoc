<?php

namespace Database\Factories;

use App\Enums\MessageStatuses;
use App\Enums\User\MessageOwner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ThreadMessage>
 */
class ThreadMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'message' => $this->faker->text(20),
            'status' => MessageStatuses::UNREAD,
            'owner' => MessageOwner::USER
        ];
    }
}
