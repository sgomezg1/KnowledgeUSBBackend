<?php

namespace App\Http\Controllers;

use App\Models\AreaConocimiento;
use App\Models\Facultad;
use App\Models\Programa;

class IndexController extends Controller
{
    public function consultarFiltros()
    {
        $authUser = auth()->guard('api')->user();
        $estados = array(
            array(
                'id' => 'En Propuesta',
                'nombre' => 'En Propuesta'
            ),
            array(
                'id' => 'En Desarrollo',
                'nombre' => 'En Desarrollo'
            ),
            array(
                'id' => 'En Correcciones',
                'nombre' => 'En Correcciones'
            ),
            array(
                'id' => 'Finalizado',
                'nombre' => 'Finalizado'
            )
        );
        $facultadUsuarioAutenticado = Programa::select('facultad_id')->where('id', $authUser->programa_id)->first();
        $facultades = Facultad::select(['id', 'nombre'])->where('id', $facultadUsuarioAutenticado->facultad_id)->get()->toArray();
        $programas = Programa::select(['id', 'nombre'])->where('facultad_id', $facultadUsuarioAutenticado->facultad_id)->get()->toArray();
        $areasConocimiento = AreaConocimiento::select(['id', 'nombre'])->get()->toArray();
        return response()->json([
            array(
                "titulo" => "Estados",
                "key" => "estado",
                "contenido" => $estados
            ),
            array(
                "titulo" => "Facultades",
                "key" => "facultad",
                "contenido" => $facultades
            ),
            array(
                "titulo" => "Programas",
                "key" => "programa",
                "contenido" => $programas
            ),
            array(
                "titulo" => "Areas de conocimiento",
                "key" => "areaConocimiento",
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
