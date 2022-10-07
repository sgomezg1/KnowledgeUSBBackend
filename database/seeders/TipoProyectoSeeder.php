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
        TipoProyecto::factory(10)->create();
    }
}
