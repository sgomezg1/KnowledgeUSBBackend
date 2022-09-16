<?php

namespace Database\Seeders;

use App\Models\TipoUsuarios;
use Illuminate\Database\Seeder;

class TipoUsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        TipoUsuarios::insert([
            [
                'nombre' => 'Administrador',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Lider de grupo de investigacion',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Coordinador Investigacion Facultad',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Profesional de investigacion',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Director de programa',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Docente',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Docente lider semillero',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Docente investigador',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Biblioteca',
                'descripcion' => ''
            ],
            [
                'nombre' => 'Visitante',
                'descripcion' => ''
            ],
        ]);
    }
}
