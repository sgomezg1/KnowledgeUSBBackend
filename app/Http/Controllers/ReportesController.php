<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class ReportesController extends Controller
{
    public function proyectosConPresupuesto(Request $request)
    {
        $busqueda = Proyecto::select([
            'proyecto.*'
        ])->with([
            'productos'
        ])->join('proyectos_clase', 'proyectos_clase.proyecto', 'proyecto.id')
            ->join('clase', 'clase.numero', 'proyectos_clase.clase')
            ->join('materia', 'materia.catalogo', 'clase.materia')
            ->join('programa', 'programa.id', 'materia.programa')
            ->join('facultad', 'facultad.id', 'programa.facultad_id');

        if ($request->estado) {
            $busqueda->whereIn('estado', $request->estado);
        }

        if ($request->facultad) {
            $busqueda->whereIn('facultad.id', $request->facultad);
        }

        if ($request->programa) {
            $busqueda->whereIn('programa.id', $request->programa);
        }

        if ($request->areaConocimiento) {
            $busqueda->whereHas('areaConocimientos', function (Builder $q) use ($request) {
                $q->whereIn('areas_conocimiento.area_conocimiento', $request->areaConocimiento);
            })->get();
        }

        if ($busqueda) {
            return response()->json([
                'success' => true,
                'proyectos' => $busqueda->get()
            ]);
        } else {
            return response()->json([
                'success' => false,
                'proyectos' => [],
                'mensaje' => 'No hay resultados para esta búsqueda'
            ]);
        }
    }

    public function proyectosPorConvocatoria(Request $request)
    {
        $busqueda = Proyecto::select([
            'proyecto.*'
        ])->whereHas('convocatorias')
            ->join('proyectos_clase', 'proyectos_clase.proyecto', 'proyecto.id')
            ->join('clase', 'clase.numero', 'proyectos_clase.clase')
            ->join('materia', 'materia.catalogo', 'clase.materia')
            ->join('programa', 'programa.id', 'materia.programa')
            ->join('facultad', 'facultad.id', 'programa.facultad_id');

        if ($request->estado) {
            $busqueda->whereIn('estado', $request->estado);
        }

        if ($request->facultad) {
            $busqueda->whereIn('facultad.id', $request->facultad);
        }

        if ($request->programa) {
            $busqueda->whereIn('programa.id', $request->programa);
        }

        if ($request->areaConocimiento) {
            $busqueda->whereHas('areaConocimientos', function (Builder $q) use ($request) {
                $q->whereIn('areas_conocimiento.area_conocimiento', $request->areaConocimiento);
            })->get();
        }

        if ($busqueda) {
            return response()->json([
                'success' => true,
                'proyectos' => $busqueda->get()
            ]);
        } else {
            return response()->json([
                'success' => false,
                'proyectos' => [],
                'mensaje' => 'No hay resultados para esta búsqueda'
            ]);
        }
    }

    public function proyectosRequierenIntegrantes(Request $request)
    {
        $busqueda = Proyecto::select([
            'proyecto.*'
        ])->whereDoesntHave('participantes')
            ->join('proyectos_clase', 'proyectos_clase.proyecto', 'proyecto.id')
            ->join('clase', 'clase.numero', 'proyectos_clase.clase')
            ->join('materia', 'materia.catalogo', 'clase.materia')
            ->join('programa', 'programa.id', 'materia.programa')
            ->join('facultad', 'facultad.id', 'programa.facultad_id');

        if ($request->estado) {
            $busqueda->whereIn('estado', $request->estado);
        }

        if ($request->facultad) {
            $busqueda->whereIn('facultad.id', $request->facultad);
        }

        if ($request->programa) {
            $busqueda->whereIn('programa.id', $request->programa);
        }

        if ($request->areaConocimiento) {
            $busqueda->whereHas('areaConocimientos', function (Builder $q) use ($request) {
                $q->whereIn('areas_conocimiento.area_conocimiento', $request->areaConocimiento);
            })->get();
        }

        if ($busqueda) {
            return response()->json([
                'success' => true,
                'proyectos' => $busqueda->get()
            ]);
        } else {
            return response()->json([
                'success' => false,
                'proyectos' => [],
                'mensaje' => 'No hay resultados para esta búsqueda'
            ]);
        }
    }

    public function proyectosDeSemillero(Request $request)
    {
        $busqueda = Proyecto::select([
            'proyecto.*'
        ])->join('proyectos_clase', 'proyectos_clase.proyecto', 'proyecto.id')
            ->join('clase', 'clase.numero', 'proyectos_clase.clase')
            ->join('materia', 'materia.catalogo', 'clase.materia')
            ->join('programa', 'programa.id', 'materia.programa')
            ->join('facultad', 'facultad.id', 'programa.facultad_id');

        if ($request->estado) {
            $busqueda->whereIn('estado', $request->estado);
        }

        if ($request->facultad) {
            $busqueda->whereIn('facultad.id', $request->facultad);
        }

        if ($request->programa) {
            $busqueda->whereIn('programa.id', $request->programa);
        }

        if ($request->areaConocimiento) {
            $busqueda->whereHas('areaConocimientos', function (Builder $q) use ($request) {
                $q->whereIn('areas_conocimiento.area_conocimiento', $request->areaConocimiento);
            })->get();
        }

        $busqueda->where('proyecto.semillero', '!=', null);

        if ($busqueda) {
            return response()->json([
                'success' => true,
                'proyectos' => $busqueda->get()
            ]);
        } else {
            return response()->json([
                'success' => false,
                'proyectos' => [],
                'mensaje' => 'No hay resultados para esta búsqueda'
            ]);
        }
    }

    public function generarReportes($nombreReporte, $nombreGeneraReporte, $rolGeneraReporte, $codigoGeneraReporte, $fechaActual)
    {
        $user = auth('api')->user();
        $data = array(
            "nombreReporte" => $nombreReporte,
            "nombreGeneraReporte" => $user->nombres. ' '.$user->apellidos,
            "rolGeneraReporte" => $rolGeneraReporte,
            "codigoGeneraReporte" => $user->codigo,
            "fechaActual" => date('Y-m-d H:i:s')
        );
        $pdf = Pdf::loadView('reportes.views.pdf-view', $data);
        return $pdf->download('reporte.pdf');
    }

    public function getVistaReportes(Request $request)
    {
        $user = auth('api')->user();
        $dataHeader = array(
            "nombreReporte" => 'REPORTE DE PRUEBA',
            "nombreGeneraReporte" => $user->nombres. ' '.$user->apellidos,
            "rolGeneraReporte" => 'ROL DE PRUEBA',
            "codigoGeneraReporte" => $user->cod_universitario,
            "fechaActual" => date('Y-m-d H:i:s')
        );
        $dataReporte = $this->proyectosConPresupuesto($request);
        return view('reportes.views.pdf-view', compact('dataHeader'));
    }
}
