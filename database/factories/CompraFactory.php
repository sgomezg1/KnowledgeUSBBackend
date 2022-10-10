<?php

namespace Database\Factories;

use App\Models\Presupuesto;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fecha_solicitud' => date('Y-m-d H:i:s'),
            'nombre' => $this->faker->name,
            'tipo' => $this->faker->name,
            'codigo_compra' => $this->faker->word,
            'valor' => $this->faker->randomNumber,
            'fecha_compra' => date('Y-m-d H:i:s'),
            'estado' => $this->faker->randomNumber,
            'link' => $this->faker->link,
            'descripcion' => $this->faker->sentence(3),
            'presupuesto' => Presupuesto::inRandomOrder()->first()->id
        ];
    }
}
