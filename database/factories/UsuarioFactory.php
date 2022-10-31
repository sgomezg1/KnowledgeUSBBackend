<?php

namespace Database\Factories;

use App\Models\Programa;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cedula' => $this->faker->randomNumber(),
            'cod_universitario' => $this->faker->randomNumber(),
            'correo_est' => $this->faker->email(),
            'password' => bcrypt('password'), // password
            'nombres' => $this->faker->name,
            'apellidos' => $this->faker->lastName(),
            'telefono' => $this->faker->phoneNumber,
            'visibilidad' => 'visible',
            'correo_personal' => $this->faker->email,
            'semillero_id' => null,
            'programa_id' => Programa::inRandomOrder()->first()->id
        ];
    }
}
