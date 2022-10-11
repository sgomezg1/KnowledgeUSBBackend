<?php

namespace Database\Seeders;

use App\Models\LineaInvestigacion;
use Illuminate\Database\Seeder;

class LineasDeInvestigacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LineaInvestigacion::factory(25)->create();
    }
}
