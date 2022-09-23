<?php

namespace Database\Seeders;

use App\Models\TipoUsuarios;
use App\Models\User;
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
        User::factory(10)->create()->each(function ($user) {
            static $number = 1;
            if ($number == 10) {$number = 1;}
            return $user->tipoUsuarios()->save( TipoUsuarios::find($number++) );
        });
    }
}
