<?php

namespace Database\Factories;

use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Factories\Factory;

class PresupuestoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'monto' => $this->faker->randomNumber(7),
            'fecha' => date('Y-m-d H:i:s'),
            'proyecto' => Proyecto::inRandomOrder()->first()->id,
            'descripcion' => $this->faker->paragraph
        ];
    }
}
