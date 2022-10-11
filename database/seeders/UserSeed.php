<?php

namespace Database\Seeders;

use App\Models\TipoUsuario;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::factory(10)->create()->each(function ($user) {
            static $number = 1;
            if ($number == 10) {$number = 1;}
            return $user->tipo_usuario()->save( TipoUsuario::find($number++) );
        });
    }
}
