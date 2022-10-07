<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramaFactory extends Factory
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
            'facultad_id' => $this->faker->randomNumber(2),
            'director' => User::with('tipoUsuarios')->where('id', 5)->first()->id
        ];
    }
}
