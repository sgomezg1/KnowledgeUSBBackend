<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParticipantesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'usuario_id' => Usuario::inRandomOrder()->first()->id,
            'proyecto' => $this->faker->randomNumber(3),
            'fecha_inicio' => $this->faker->date('Y-m-d', 'now'),
            'fecha_fin' => $this->faker->date('Y-m-d', 'now'),
            'rol' => $this->faker->word()
        ];
    }
}
