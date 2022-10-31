<?php

namespace Database\Seeders;

use App\Models\Semillero;
use Illuminate\Database\Seeder;

class SemilleroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semillero::factory(10)->create();
    }
}
