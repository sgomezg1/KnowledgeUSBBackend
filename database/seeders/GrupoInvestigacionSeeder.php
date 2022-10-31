<?php

namespace Database\Seeders;

use App\Models\GrupoInvestigacion;
use Illuminate\Database\Seeder;

class GrupoInvestigacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GrupoInvestigacion::factory(25)->create();
    }
}
