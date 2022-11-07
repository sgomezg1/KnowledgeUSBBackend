<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BuscadorProyectosController extends Controller
{
    public function showProyectos(Request $request)
    {
        $buscador = Proyecto::select([
            'proyecto.*',
            'facultad.nombre as nombre_facultad',
            'programa.nombre as nombre_programa'
        ])->with([
            'participantes',
            'areaConocimientos'
        ])->join('proyectos_clase', 'proyectos_clase.proyecto', 'proyecto.id')
            ->join('clase', 'clase.numero', 'proyectos_clase.clase')
            ->join('materia', 'materia.catalogo', 'clase.materia')
            ->join('programa', 'programa.id', 'materia.programa')
            ->join('facultad', 'facultad.id', 'programa.facultad_id');

        if ($request->titulo) {
            $buscador->whereLike('titulo', $request->titulo);
        }

        if ($request->estado) {
            $buscador->whereIn('estado', $request->estado);
        }

        if ($request->facultad) {
            $buscador->whereIn('facultad.id', $request->facultad);
        }
        
        if ($request->programa) {
            $buscador->whereIn('programa.id', $request->programa);
        }

        if ($request->areaConocimiento) {
            $buscador->whereHas('areaConocimientos', function (Builder $q) use ($request) {
                $q->whereIn('areas_conocimiento.area_conocimiento', $request->areaConocimiento);
            })->get();
        }

        if ($buscador) {
            return response()->json([
                'success' => true,
                'proyectos' => $buscador->paginate()
            ]);
        } else {
            return response()->json([
                'success' => false,
                'proyectos' => [],
                'mensaje' => 'No hay resultados para esta búsqueda'
            ]);
        }
    }

    public function proyecto($id) {
        $consulta = Proyecto::with([
            'macro_proyecto',
            'semillero',
            'tipo_proyecto',
            'antecedentes',
            'areaConocimientos',
            'participantes',
            'productos',
        ])->where('id', $id)->first();
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
