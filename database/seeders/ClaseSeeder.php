<?php

namespace Database\Seeders;

use App\Models\Clase;
use Illuminate\Database\Seeder;

class ClaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clase::factory(50)->create();
    }
}
