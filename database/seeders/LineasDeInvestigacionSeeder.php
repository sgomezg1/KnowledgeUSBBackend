<?php

namespace Database\Seeders;

use App\Models\LineasDeInvestigacion;
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
        LineasDeInvestigacion::factory(25)->create();
    }
}
