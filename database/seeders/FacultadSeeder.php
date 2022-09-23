<?php

namespace Database\Seeders;

use App\Models\Facultad;
use App\Models\User;
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
                'decano' => User::with('tipoUsuarios')->where('id', 6)->first()->id,
                'coor_inv' => User::with('tipoUsuarios')->where('id', 3)->first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Humanidades y Educación',
                'decano' => User::with('tipoUsuarios')->where('id', 6)->first()->id,
                'coor_inv' => User::with('tipoUsuarios')->where('id', 3)->first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Ingeniería',
                'decano' => User::with('tipoUsuarios')->where('id', 6)->first()->id,
                'coor_inv' => User::with('tipoUsuarios')->where('id', 3)->first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Ciencias Economicas',
                'decano' => User::with('tipoUsuarios')->where('id', 6)->first()->id,
                'coor_inv' => User::with('tipoUsuarios')->where('id', 3)->first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'nombre' => 'Ciencias Juridicas',
                'decano' => User::with('tipoUsuarios')->where('id', 6)->first()->id,
                'coor_inv' => User::with('tipoUsuarios')->where('id', 3)->first()->id,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }
}
