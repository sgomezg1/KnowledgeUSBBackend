<?php

namespace Database\Factories;

use App\Models\MacroProyecto;
use App\Models\Semillero;
use App\Models\TipoProyecto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProyectoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tiposConocimiento = array('Tacito', 'Implicito');
        $randomNum = rand(0, 1);
        $estados = array('En Propuesta', 'En Desarrollo', 'En Correcciones', 'Finalizado');
        $randomEst = rand(0, 3);
        return [
            'titulo' => $this->faker->sentence(2),
            'estado' => $estados[$randomEst],
            'descripcion' => $this->faker->sentence(3),
            'macro_proyecto' => MacroProyecto::inRandomOrder()->first()->id,
            'fecha_inicio' => date('Y-m-d H:i:s'),
            'fecha_fin' => date('Y-m-d H:i:s'),
            'semillero' => Semillero::inRandomOrder()->first()->id,
            'retroalimentacion_final' => $this->faker->sentence(10),
            'visibilidad' => true,
            'ciudad' => $this->faker->city,
            'metodologia' => $this->faker->sentence(10),
            'conclusiones' => $this->faker->sentence(10),
            'justificacion' => $this->faker->sentence(10),
            'tipo_proyecto' => TipoProyecto::inRandomOrder()->first()->nombre,
            'tipo_conocimiento' => $tiposConocimiento[$randomNum]
        ];
    }
}
