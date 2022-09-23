<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numero' => $this->faker->randomNumber(5),
            'nombre' => $this->faker->name,
            'semestre' => $this->faker->randomNumber(1),
            'materia' => $this->faker->randomNumber(2),
            'profesor' => User::inRandomOrder()->first()->id
         ];
    }
}
