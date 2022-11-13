<?php

namespace App\Http\Controllers;

use App\Models\AreaConocimiento;
use App\Models\Facultad;
use App\Models\Programa;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function consultarFiltros() {
        $estados = array(
            array(
                'id' => 'En Propuesta',
                'nombre' => 'En Propuesta'
            ),
            array(
                'id' => 'En Propuesta',
                'nombre' => 'En Desarrollo'
            ),
            array(
                'id' => 'En Propuesta',
                'nombre' => 'En Correcciones'
            ),
            array(
                'id' => 'En Propuesta',
                'nombre' => 'Finalizado'
            )
        );
        $facultades = Facultad::select(['id', 'nombre'])->get()->toArray();
        $programas = Programa::select(['id', 'nombre'])->get()->toArray();
        $areasConocimiento = AreaConocimiento::select(['id', 'nombre'])->get()->toArray();
        return response()->json([
            array(
                "titulo" => "Estados",
                "key" => "estados",
                "contenido" => $estados
            ),
            array(
                "titulo" => "Facultades",
                "key" => "facultades",
                "contenido" => $facultades
            ),
            array(
                "titulo" => "Programas",
                "key" => "programas",
                "contenido" => $programas
            ),
            array(
                "titulo" => "Areas de conocimiento",
                "key" => "areasConocimiento",
                "contenido" => $areasConocimiento
            )
        ]);
    }

    public function getProgramas()
    {
        return response()->json(Programa::select('id', 'nombre')->get());
    }

    public function getFacultades()
    {
        return response()->json(Facultad::select('id', 'nombre')->get());
    }
}
