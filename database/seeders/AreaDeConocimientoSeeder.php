<?php

namespace Database\Seeders;

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
        AreaDeConocimiento::factory(5)->create();
    }
}
