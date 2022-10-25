<?php

namespace Database\Factories;

use App\Models\Convocatorium;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetalleConvocatoriumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'objetivos_convocatoria' => $this->faker->sentence(2),
            'requisitos' => $this->faker->sentence(2),
            'modalidade' => $this->faker->sentence(2),
            'convocatoria_id' => Convocatorium::inRandomOrder()->first()->id
        ];
    }
}
