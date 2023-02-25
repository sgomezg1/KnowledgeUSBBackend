<?php

namespace Tests\Feature;

use App\Models\Proyecto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BuscadorProyectosControllerTest extends TestCase
{
    /** @test */
    public function it_can_get_proyectos()
    {
        $response = $this->post('/api/proyectos');
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_proyecto_por_id()
    {
        $proyectoId = Proyecto::inRandomOrder()->first()->id;
        $response = $this->post('/api/proyectos/' . $$proyectoId);
        $response->assertStatus(200);
    }
}
