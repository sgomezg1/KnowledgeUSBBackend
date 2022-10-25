<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventoFactory extends Factory
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
            'fecha' => date('Y-m-d H:i:s'),
            'entidad' => $this->faker->word,
            'estado' => 'En curso',
            'sitio_web' => $this->faker->word,
            'url_memoria' => $this->faker->word
        ];
    }
}
