<?php

namespace Database\Factories;

use App\Models\Materium;
use App\Models\Usuario;
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
            'materia' => Materium::inRandomOrder()->first()->catalogo,
            'profesor' => Usuario::with('tipoUsuarios')->whereHas('tipoUsuarios', function($q) {$q->where('tipo_usuario.nombre', 'Docente'); } )->inRandomOrder()->first()->cedula
         ];
    }
}
