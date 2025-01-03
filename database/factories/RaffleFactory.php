<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Raffle>
 */
class RaffleFactory extends Factory
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

            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'start_date' => $this->faker->dateTime(),
            'end_date' => $this->faker->dateTime(),
            "status" => $this->faker->randomElement(["active", "inactive", "finalized"]),
        ];
    }
}
