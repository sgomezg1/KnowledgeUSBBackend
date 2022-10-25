<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ConvocatoriumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_convocatoria' => $this->faker->name,
            'fecha_inicio' => date('Y-m-d H:i:s'),
            'fecha_final' => date('Y-m-d H:i:s'),
            'contexto' => $this->faker->paragraph,
            'numero_productos' => $this->faker->randomNumber(1),
            'estado' => $this->faker->word,
            'tipo' => $this->faker->word,
            'entidad' => $this->faker->name
        ];
    }
}
