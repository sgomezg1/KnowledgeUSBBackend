<?php

namespace Tests\Feature;

use App\Models\Facultad;
use App\Models\Programa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReportesControllerTest extends TestCase
{
    /** @test */
    public function it_can_get_reporte_de_presupuestos()
    {
        $response = $this->post('/api/reportes/presupuestos', [
            "estado" => ["En Desarrollo"],
            "facultad" => [3],
            "programa" => [8]
        ]);
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_reporte_de_convocatorias()
    {
        $response = $this->post('/api/reportes/convocatorias', [
            "estado" => ["En Desarrollo"],
            "facultad" => [3],
            "programa" => [8]
        ]);
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_reporte_de_integrantes()
    {
        $response = $this->post('/api/reportes/integrantes', [
            "estado" => ["En Desarrollo"],
            "facultad" => [3],
            "programa" => [8]
        ]);
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_reporte_de_semillero()
    {
        $response = $this->post('/api/reportes/semillero', [
            "estado" => ["En Desarrollo"],
            "facultad" => [3],
            "programa" => [8]
        ]);
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_reporte_de_proyectos_aula()
    {
        $response = $this->post('/api/reportes/proyectos-aula', [
            "estado" => ["En Desarrollo"],
            "facultad" => [3],
            "programa" => [8]
        ]);
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_reporte_de_investigadores_independientes()
    {
        $response = $this->post('/api/reportes/investigadores-independientes', [
            "estado" => ["En Desarrollo"],
            "facultad" => [3],
            "programa" => [8]
        ]);
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_reporte_de_trabajo_de_grado()
    {
        $response = $this->post('/api/reportes/trabajo-de-grado', [
            "estado" => ["En Desarrollo"],
            "facultad" => [3],
            "programa" => [8]
        ]);
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_reporte_de_facultad()
    {
        $facultad = Facultad::inRandomOrder()->first()->id;
        $response = $this->post('/api/reportes/facultad/' . $facultad->id, [
            "estado" => ["En Desarrollo"]
        ]);
        $response->assertStatus(200);
    }

    /** @test */
    public function it_can_get_reporte_de_programa()
    {
        $programa = Programa::inRandomOrder()->first()->id;
        $response = $this->post('/api/reportes/programa' . $programa->id, [
            "estado" => ["En Desarrollo"]
        ]);
        $response->assertStatus(200);
    }
}
