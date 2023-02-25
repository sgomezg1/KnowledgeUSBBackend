<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardControllerTest extends TestCase
{
    /** @test */
    public function it_can_get_elementos_dashboard()
    {
        $response = $this->post('/api/graficos/elementos-dashboard');
        $response->assertStatus(200);
    }
    /** @test */
    public function it_can_get_datos_graficas_finalizados_facultad()
    {
        $response = $this->post('/api/graficos/datos-graficas-finalizados-facultad');
        $response->assertStatus(200);
    }
    /** @test */
    public function it_can_get_datos_graficas_grado_semillero_facultad()
    {
        $response = $this->post('/api/graficos/datos-graficas-grado-semillero-facultad');
        $response->assertStatus(200);
    }
    /** @test */
    public function it_can_get_datos_graficas_presupuesto_proyectos_por_mes()
    {
        $response = $this->post('/api/graficos/datos-graficas-presupuesto-proyectos-por-mes');
        $response->assertStatus(200);
    }
}
