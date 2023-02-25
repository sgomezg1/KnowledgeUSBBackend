<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    /** @test */
    public function it_can_get_filtros()
    {
        $response = $this->post('/api/reportes/filtros');
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_programas()
    {
        $response = $this->post('/api/reportes/programas');
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_facultades()
    {
        $response = $this->post('/api/reportes/facultades');
        $response->assertStatus(200);
    }
}
