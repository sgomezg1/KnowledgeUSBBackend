<?php

namespace Database\Seeders;

use App\Models\MacroProyecto;
use Illuminate\Database\Seeder;

class MacroProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MacroProyecto::factory(10)->create();
    }
}
