<?php

namespace Database\Factories;

use App\Models\Programa;
use Illuminate\Database\Eloquent\Factories\Factory;

class MateriumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'catalogo' => $this->faker->firstName,
            'nombre' => $this->faker->name,
            'programa' => Programa::inRandomOrder()->first()->id
        ];
    }
}
