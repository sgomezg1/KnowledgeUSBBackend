<?php

namespace Database\Seeders;

use App\Models\Facultad;
use App\Models\Programa;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class ProgramaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Programas Psicología

        Programa::insert(
            [
                'nombre' => 'Psicología',
                'facultad_id' => Facultad::where('nombre', 'Psicología')->first()->id,
                'director' => null
            ]
        );

        // Programas ciencias de la educación

        Programa::insert(
            [
                [
                    'nombre' => 'Licenciatura en Educación Infantil',
                    'facultad_id' => Facultad::where('nombre', 'Humanidades y Educación')->first()->id,
                    'director' => null
                ],
                [
                    'nombre' => 'Licenciatura en Filosofía',
                    'facultad_id' => Facultad::where('nombre', 'Humanidades y Educación')->first()->id,
                    'director' => null
                ],
                [
                    'nombre' => 'Licenciatura en Teología',
                    'facultad_id' => Facultad::where('nombre', 'Humanidades y Educación')->first()->id,
                    'director' => null
                ],
                [
                    'nombre' => 'Licenciatura en Lengua Inglesa',
                    'facultad_id' => Facultad::where('nombre', 'Humanidades y Educación')->first()->id,
                    'director' => null
                ],
            ]
        );

        // Programas ingeniería

        Programa::insert(
            [
                [
                    'nombre' => 'Ingeniería Aeronáutica',
                    'facultad_id' => Facultad::where('nombre', 'Ingeniería')->first()->id,
                    'director' => null
                ],
                [
                    'nombre' => 'Ingeniería Electrónica',
                    'facultad_id' => Facultad::where('nombre', 'Ingeniería')->first()->id,
                    'director' => null
                ],
                [
                    'nombre' => 'Ingeniería Mecatrónica',
                    'facultad_id' => Facultad::where('nombre', 'Ingeniería')->first()->id,
                    'director' => null
                ],
                [
                    'nombre' => 'Ingeniería Multimedia',
                    'facultad_id' => Facultad::where('nombre', 'Ingeniería')->first()->id,
                    'director' => null
                ],
                [
                    'nombre' => 'Ingeniería de Sistemas',
                    'facultad_id' => Facultad::where('nombre', 'Ingeniería')->first()->id,
                    'director' => null
                ],
                [
                    'nombre' => 'Ingeniería de Sonido',
                    'facultad_id' => Facultad::where('nombre', 'Ingeniería')->first()->id,
                    'director' => null
                ]
            ]
        );

        // Programas Ciencias Económicas

        Programa::insert(
            [
                [
                    'nombre' => 'Administracion de Empresas',
                    'facultad_id' => Facultad::where('nombre', 'Ciencias Economicas')->first()->id,
                    'director' => null
                ],
                [
                    'nombre' => 'Contaduria Publica',
                    'facultad_id' => Facultad::where('nombre', 'Ciencias Economicas')->first()->id,
                    'director' => null
                ]
            ]
        );

        // Programas Ciencias Jurídicas

        Programa::insert(
            [
                [
                    'nombre' => 'Ciencia Política',
                    'facultad_id' => Facultad::where('nombre', 'Ciencias Juridicas')->first()->id,
                    'director' => null
                ],
                [
                    'nombre' => 'Derecho',
                    'facultad_id' => Facultad::where('nombre', 'Ciencias Juridicas')->first()->id,
                    'director' => null
                ],
                [
                    'nombre' => 'Relaciones Internacionales',
                    'facultad_id' => Facultad::where('nombre', 'Ciencias Juridicas')->first()->id,
                    'director' => null
                ]
            ]
        );
    }
}
