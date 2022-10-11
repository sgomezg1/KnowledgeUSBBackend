<?php

namespace Database\Seeders;

use App\Models\AreaConocimiento;
use App\Models\AreaDeConocimiento;
use Illuminate\Database\Seeder;

class AreaDeConocimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AreaConocimiento::factory(5)->create();
    }
}
