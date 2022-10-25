<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class GrupoInvestigacionFactory extends Factory
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
            'fecha_fun' => date('Y-m-d H:i:s'),
            'categoria' => $this->faker->name,
            'fecha_cat' => date('Y-m-d H:i:s'),
            'director_grupo' => Usuario::with('tipoUsuarios')->whereHas('tipoUsuarios', function($q) {$q->where('tipo_usuario.nombre', 'Lider de grupo de investigacion'); } )->inRandomOrder()->first()->cedula
        ];
    }
}
