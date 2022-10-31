<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AreaConocimientoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'gran_area' => $this->faker->sentence(2),
            'descripcion' => $this->faker->sentence(3)
        ];
    }
}
