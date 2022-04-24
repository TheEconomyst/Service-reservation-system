<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FormFields>
 */
class FormFieldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'field_type' => $this->faker->numberBetween(0, 1),
            'is_mandatory' => $this->faker->boolean(),
            'attached_data_type' => $this->faker->numberBetween(0, 1)
        ];
    }
}
