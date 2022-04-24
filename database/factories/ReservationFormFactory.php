<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFormFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name()
        ];
    }
}

?>
