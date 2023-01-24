<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class BuscadorProyectosController extends Controller
{
    public function showProyectos(Request $request)
    {
        $buscador = Proyecto::select([
            'proyecto.*'
        ])->whereHas('participantes')
            ->with([
                'participantes',
                'areaConocimientos',
                'clases.materium.programas.facultad'
            ])->groupBy('proyecto.id');
        $buscador = FilterQueriesController::retornarFiltros($buscador, $request, 'proyecto');
        $buscador->groupBy('proyecto.id');
        if ($buscador) {
            return response()->json([
                'success' => true,
                'proyectos' => $buscador->get()
            ]);
        } else {
            return response()->json([
                'success' => false,
                'proyectos' => [],
                'mensaje' => 'No hay resultados para esta búsqueda'
            ]);
        }
    }

    public function proyecto($id)
    {
        $consulta = Proyecto::select([
            'proyecto.*',
            'facultad.nombre as nombre_facultad',
            'programa.nombre as nombre_programa'
        ])->join('proyectos_clase', 'proyectos_clase.proyecto', 'proyecto.id')
            ->join('clase', 'clase.numero', 'proyectos_clase.clase')
            ->join('materia', 'materia.catalogo', 'clase.materia')
            ->join('programa', 'programa.id', 'materia.programa')
            ->join('facultad', 'facultad.id', 'programa.facultad_id')
            ->with([
                'macro_proyecto',
                'semillero',
                'tipo_proyecto',
                'antecedentes',
                'areaConocimientos',
                'participantes',
                'productos',
                'presupuestos'
            ])->where('proyecto.id', $id)->first();
        if ($consulta) {
            return response()->json([
                'success' => true,
                'proyectos' => $consulta
            ]);
        } else {
            return response()->json([
                'success' => false,
                'mensaje' => 'No hay un proyecto con este ID'
            ]);
        }
    }
}
