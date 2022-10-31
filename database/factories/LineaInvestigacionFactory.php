<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LineaInvestigacionFactory extends Factory
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
            'descripcion' => $this->faker->sentence(5),
            'fecha' => date('Y-m-d H:i:s')
        ];
    }
}
