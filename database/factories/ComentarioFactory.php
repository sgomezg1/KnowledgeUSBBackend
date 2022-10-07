<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comentario' => $this->faker->sentence(10),
            'calificacion' => $this->faker->randomNumber(1),
            'fase' => $this->faker->word,
            'nivel' => $this->faker->word,
            'fecha' => date('Y-m-d H:i:s'),
            'producto_id' => Producto::inRandomOrder()->first()->id
        ];
    }
}
