<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacultadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'decano' => Usuario::with('tipoUsuarios', function($query) {
                $query->where('id', '6');
            })->first()->id,
            'coor_inv' => Usuario::with('tipoUsuarios', function($query) {
                $query->where('id', '3');
            })->first()->id,
            'created_at' => $this->faker->date('Y-m-d H:i:s', 'now')
        ];
    }
}
