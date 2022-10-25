<?php

namespace Database\Factories;

use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo_producto' => $this->faker->title,
            'tipo_producto' => $this->faker->word(1),
            'url_repo' => 'https://source.unsplash.com/random/800x600',
            'fecha' => date('Y-m-d H:i:s'),
            'proyecto' => Proyecto::inRandomOrder()->first()->id
        ];
    }
}
