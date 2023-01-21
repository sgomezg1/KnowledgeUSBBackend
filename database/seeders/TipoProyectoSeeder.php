<?php

namespace Database\Seeders;

use App\Models\TipoProyecto;
use Illuminate\Database\Seeder;

class TipoProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoProyecto::create([
            'nombre' => 'Proyecto de Aula',
            'descripcion' => ''
        ]);

        TipoProyecto::create([
            'nombre' => 'Trabajo de Grado',
            'descripcion' => ''
        ]);

        TipoProyecto::create([
            'nombre' => 'Inv. Independientes',
            'descripcion' => ''
        ]);

        TipoProyecto::create([
            'nombre' => 'Convocatoria',
            'descripcion' => ''
        ]);

        TipoProyecto::create([
            'nombre' => 'Semillero',
            'descripcion' => ''
        ]);
    }
}
