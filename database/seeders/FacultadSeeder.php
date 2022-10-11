<?php

namespace Database\Seeders;

use App\Models\Facultad;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class FacultadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Facultad::insert([
            [
                'nombre' => 'Psicología',
                'decano' => null,
                'coor_inv' => null,

            ],
            [
                'nombre' => 'Humanidades y Educación',
                'decano' => null,
                'coor_inv' => null,

            ],
            [
                'nombre' => 'Ingeniería',
                'decano' => null,
                'coor_inv' => null,

            ],
            [
                'nombre' => 'Ciencias Economicas',
                'decano' => null,
                'coor_inv' => null,

            ],
            [
                'nombre' => 'Ciencias Juridicas',
                'decano' => null,
                'coor_inv' => null,

            ]
        ]);
    }
}
