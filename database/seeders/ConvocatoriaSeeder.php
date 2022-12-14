<?php

namespace Database\Seeders;

use App\Models\Convocatorium;
use Illuminate\Database\Seeder;

class ConvocatoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Convocatorium::factory(10)->create();
    }
}
