<?php

namespace Database\Seeders;

use App\Models\Materium;
use Illuminate\Database\Seeder;

class MateriumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Materium::factory(10)->create();
    }
}
