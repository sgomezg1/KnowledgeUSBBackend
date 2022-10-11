<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class SemilleroFactory extends Factory
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
            'descripcion' => $this->faker->sentence(3),
            'fecha_fun' => date('Y-m-d H:i:s'),
            'grupo_investigacion' => $this->faker->randomNumber,
            'lider_semillero' => Usuario::with('tipoUsuarios')->where('id', 7)->first()->id,
            'linea_investigacion' => $this->faker->randomNumber
        ];
    }
}
