<?php

namespace Database\Factories;

use App\Models\Raffle;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'raffle_id' => Raffle::factory(),
            'user_id' => User::factory(),
            'ticket_number' => $this->faker->numberBetween(1000, 9999),
            "buy_date" => $this->faker->dateTime(),

        ];
    }
}
