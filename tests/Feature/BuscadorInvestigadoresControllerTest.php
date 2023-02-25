<?php

namespace Tests\Feature;

use App\Models\Usuario;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BuscadorInvestigadoresControllerTest extends TestCase
{
    /** @test */
    public function it_can_get_investigadores()
    {
        $response = $this->post('/api/investigadores');
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_investigador_por_id()
    {
        $proyectoId = Usuario::inRandomOrder()->first()->id;
        $response = $this->post('/api/investigadores/' . $$proyectoId);
        $response->assertStatus(200);
    }
}
