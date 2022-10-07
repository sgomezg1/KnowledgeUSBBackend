<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MacroProyectoFactory extends Factory
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
            'descripcion' => $this->faker->sentence(10),
            'fecha_inicio' => date('Y-m-d H:i:s'),
            'fecha_fin' => date('Y-m-d H:i:s'),
            'estado' => $this->faker->word
        ];
    }
}
