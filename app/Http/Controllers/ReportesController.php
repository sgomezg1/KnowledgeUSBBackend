<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class ReportesController extends Controller
{
    public function proyectosConPresupuesto(Request $request)
    {
        $busqueda = Proyecto::select([
            'proyecto.*',
            'facultad.nombre as nombre_facultad',
            'programa.nombre as nombre_programa'
        ])->whereHas(
            'presupuestos'
        )->join('proyectos_clase', 'proyectos_clase.proyecto', 'proyecto.id')
            ->join('clase', 'clase.numero', 'proyectos_clase.clase')
            ->join('materia', 'materia.catalogo', 'clase.materia')
            ->join('programa', 'programa.id', 'materia.programa')
            ->join('facultad', 'facultad.id', 'programa.facultad_id');

        $busqueda = FilterQueriesController::retornarFiltros($busqueda, $request);

        if ($busqueda) {
            $this->generarReportes('PROYECTOS CON PRESUPUESTO ASIGNADO', $request->rol, $busqueda->get(), 'reporte_proyecto_con_presupuesto_asignado_'.date('Y_m_d_h_i_s'));
            return response()->json([
                'success' => true,
                'mensaje' => 'Reporte generado con exito'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'mensaje' => 'No hay resultados para esta búsqueda'
            ]);
        }
    }

    public function proyectosPorConvocatoria(Request $request)
    {
        $busqueda = Proyecto::select([
            'proyecto.*',
            'facultad.nombre as nombre_facultad',
            'programa.nombre as nombre_programa'
        ])->whereHas('convocatorias')
            ->join('proyectos_clase', 'proyectos_clase.proyecto', 'proyecto.id')
            ->join('clase', 'clase.numero', 'proyectos_clase.clase')
            ->join('materia', 'materia.catalogo', 'clase.materia')
            ->join('programa', 'programa.id', 'materia.programa')
            ->join('facultad', 'facultad.id', 'programa.facultad_id');

        $busqueda = FilterQueriesController::retornarFiltros($busqueda, $request);

        if ($busqueda) {
            $this->generarReportes('PROYECTOS CON PRESUPUESTO ASIGNADO', $request->rol, $busqueda->get(), 'reporte_proyecto_con_presupuesto_asignado_'.date('Y_m_d_h_i_s'));
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
            'proyecto.*',
            'facultad.nombre as nombre_facultad',
            'programa.nombre as nombre_programa'
        ])->whereDoesntHave('participantes')
            ->join('proyectos_clase', 'proyectos_clase.proyecto', 'proyecto.id')
            ->join('clase', 'clase.numero', 'proyectos_clase.clase')
            ->join('materia', 'materia.catalogo', 'clase.materia')
            ->join('programa', 'programa.id', 'materia.programa')
            ->join('facultad', 'facultad.id', 'programa.facultad_id');

        $busqueda = FilterQueriesController::retornarFiltros($busqueda, $request);

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
            'proyecto.*',
            'facultad.nombre as nombre_facultad',
            'programa.nombre as nombre_programa'
        ])->join('proyectos_clase', 'proyectos_clase.proyecto', 'proyecto.id')
            ->join('clase', 'clase.numero', 'proyectos_clase.clase')
            ->join('materia', 'materia.catalogo', 'clase.materia')
            ->join('programa', 'programa.id', 'materia.programa')
            ->join('facultad', 'facultad.id', 'programa.facultad_id');

        $busqueda = FilterQueriesController::retornarFiltros($busqueda, $request);

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

    public function generarReportes($nombreReporte, $rolGeneraReporte, $dataReporte, $nombreArchivoPdf)
    {
        $data = $dataReporte;
        $user = auth('api')->user();
        $dataHeader = array(
            "nombreReporte" => $nombreReporte,
            "nombreGeneraReporte" => $user->nombres. ' '.$user->apellidos,
            "rolGeneraReporte" => $rolGeneraReporte,
            "codigoGeneraReporte" => $user->cod_universitario,
            "fechaActual" => date('Y-m-d H:i:s')
        );
        $presupuestos = true;
        $pdf = Pdf::loadView('reportes.views.pdf-view', compact('dataHeader', 'data', 'presupuestos'));
        $content = $pdf->download()->getOriginalContent();
        Storage::put('public/pdfs/'.$nombreArchivoPdf.'.pdf', $content);
    }

    public function getVistaReportes(Request $request)
    {
        $dataHeader = array(
            "nombreReporte" => 'REPORTE DE PRUEBA',
            "nombreGeneraReporte" => 'SEBASTIAN GOMEZ',
            "rolGeneraReporte" => 'ROL DE PRUEBA',
            "codigoGeneraReporte" => '30000064428',
            "fechaActual" => date('Y-m-d H:i:s')
        );
        $dataReporte = $this->proyectosConPresupuesto($request);
        $data = $dataReporte->getData();
        if ($data->success) {
            $data = $data->proyectos;
        } else {
            $data = array();
        }
        return view('reportes.views.pdf-view', compact('dataHeader', 'data'));
    }
}
