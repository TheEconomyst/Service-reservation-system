<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'creation_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'state' => $this->faker->numberBetween(1, 3),
            'price' => $this->faker->randomFloat(2, 10, 90),
        ];
    }
}
