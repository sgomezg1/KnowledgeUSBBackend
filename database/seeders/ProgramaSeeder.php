<?php

namespace Database\Seeders;

use App\Models\Facultad;
use App\Models\Programa;
use App\Models\User;
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
                'director' => User::with('tipoUsuarios')->where('id', 6)->first()->id
            ]
        );

        // Programas ciencias de la educación

        Programa::insert(
            [
                [
                    'nombre' => 'Licenciatura en Educación Infantil',
                    'facultad_id' => Facultad::where('nombre', 'Humanidades y Educación')->first()->id,
                    'director' => User::with('tipoUsuarios')->where('id', 6)->first()->id
                ],
                [
                    'nombre' => 'Licenciatura en Filosofía',
                    'facultad_id' => Facultad::where('nombre', 'Humanidades y Educación')->first()->id,
                    'director' => User::with('tipoUsuarios')->where('id', 6)->first()->id
                ],
                [
                    'nombre' => 'Licenciatura en Teología',
                    'facultad_id' => Facultad::where('nombre', 'Humanidades y Educación')->first()->id,
                    'director' => User::with('tipoUsuarios')->where('id', 6)->first()->id
                ],
                [
                    'nombre' => 'Licenciatura en Lengua Inglesa',
                    'facultad_id' => Facultad::where('nombre', 'Humanidades y Educación')->first()->id,
                    'director' => User::with('tipoUsuarios')->where('id', 6)->first()->id
                ],
            ]
        );

        // Programas ingeniería

        Programa::insert(
            [
                [
                    'nombre' => 'Ingeniería Aeronáutica',
                    'facultad_id' => Facultad::where('nombre', 'Ingeniería')->first()->id,
                    'director' => User::with('tipoUsuarios')->where('id', 6)->first()->id
                ],
                [
                    'nombre' => 'Ingeniería Electrónica',
                    'facultad_id' => Facultad::where('nombre', 'Ingeniería')->first()->id,
                    'director' => User::with('tipoUsuarios')->where('id', 6)->first()->id
                ],
                [
                    'nombre' => 'Ingeniería Mecatrónica',
                    'facultad_id' => Facultad::where('nombre', 'Ingeniería')->first()->id,
                    'director' => User::with('tipoUsuarios')->where('id', 6)->first()->id
                ],
                [
                    'nombre' => 'Ingeniería Multimedia',
                    'facultad_id' => Facultad::where('nombre', 'Ingeniería')->first()->id,
                    'director' => User::with('tipoUsuarios')->where('id', 6)->first()->id
                ],
                [
                    'nombre' => 'Ingeniería de Sistemas',
                    'facultad_id' => Facultad::where('nombre', 'Ingeniería')->first()->id,
                    'director' => User::with('tipoUsuarios')->where('id', 6)->first()->id
                ],
                [
                    'nombre' => 'Ingeniería de Sonido',
                    'facultad_id' => Facultad::where('nombre', 'Ingeniería')->first()->id,
                    'director' => User::with('tipoUsuarios')->where('id', 6)->first()->id
                ]
            ]
        );

        // Programas Ciencias Económicas

        Programa::insert(
            [
                [
                    'nombre' => 'Ciencia Política',
                    'facultad_id' => Facultad::where('nombre', 'Ciencias Juridicas')->first()->id,
                    'director' => User::with('tipoUsuarios')->where('id', 6)->first()->id
                ],
                [
                    'nombre' => 'Derecho',
                    'facultad_id' => Facultad::where('nombre', 'Ciencias Juridicas')->first()->id,
                    'director' => User::with('tipoUsuarios')->where('id', 6)->first()->id
                ],
                [
                    'nombre' => 'Relaciones Internacionales',
                    'facultad_id' => Facultad::where('nombre', 'Ciencias Juridicas')->first()->id,
                    'director' => User::with('tipoUsuarios')->where('id', 6)->first()->id
                ]
            ]
        );

        // Programas Ciencias Jurídicas

    }
}
