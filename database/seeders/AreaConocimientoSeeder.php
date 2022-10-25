<?php

namespace Database\Seeders;

use App\Models\AreaConocimiento;
use Illuminate\Database\Seeder;

class AreaConocimientoSeeder extends Seeder
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
