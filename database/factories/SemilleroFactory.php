<?php

namespace Database\Factories;

use App\Models\LineaInvestigacion;
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
            'grupo_investigacion' => Usuario::with('tipoUsuarios')->whereHas('tipoUsuarios', function($q) {$q->where('tipo_usuario.nombre', 'Lider de grupo de investigacion'); } )->inRandomOrder()->first()->cedula,
            'lider_semillero' => Usuario::with('tipoUsuarios')->whereHas('tipoUsuarios', function($q) {$q->where('tipo_usuario.nombre', 'Docente lider semillero'); } )->inRandomOrder()->first()->cedula,
            'linea_investigacion' => LineaInvestigacion::inRandomOrder()->first()->nombre
        ];
    }
}
