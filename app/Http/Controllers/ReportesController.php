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
        $datosMostrar = array(
            'presupuestos' => true,
            'semillero' => false,
            'convocatorias' => false,
        );
        return $this->retornoRespuestaReporte($busqueda, 'PROYECTOS CON PRESUPUESTO ASIGNADO', $request->rol, 'reporte_proyectos_por_convocatoria_' . date('Y_m_d_h_i_s'), $datosMostrar);
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
        $datosMostrar = array(
            'presupuestos' => false,
            'semillero' => false,
            'convocatorias' => true,
        );
        return $this->retornoRespuestaReporte($busqueda, 'PROYECTOS POR CONVOCATORIA', $request->rol, 'reporte_proyectos_por_convocatoria_' . date('Y_m_d_h_i_s'), $datosMostrar);
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
        $datosMostrar = array(
            'presupuestos' => false,
            'semillero' => false,
            'convocatorias' => false,
        );
        return $this->retornoRespuestaReporte($busqueda, 'PROYECTOS REQUIEREN INTEGRANTES', $request->rol, 'reporte_proyectos_requieren_integrantes_' . date('Y_m_d_h_i_s'), $datosMostrar);
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
        $datosMostrar = array(
            'presupuestos' => false,
            'semillero' => true,
            'convocatorias' => false,
        );
        return $this->retornoRespuestaReporte($busqueda, 'PROYECTOS DE AULA', $request->rol, 'reporte_proyectos_semillero_' . date('Y_m_d_h_i_s'), $datosMostrar);
    }

    public function proyectosDeAula(Request $request)
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
        $busqueda->where('proyecto.tipo_proyecto', '!=', 'Proyecto de Aula');
        $datosMostrar = array(
            'presupuestos' => true,
            'nota' => false,
            'convocatorias' => false,
        );
        return $this->retornoRespuestaReporte($busqueda, 'PROYECTOS DE AULA', $request->rol, 'reporte_proyectos_de_aula_' . date('Y_m_d_h_i_s'), $datosMostrar);
    }

    public function proyectosInvestigadoresIndependientes(Request $request)
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
        $busqueda->where('proyecto.tipo_proyecto', 'Investigadores Independientes');
        $datosMostrar = array(
            'presupuestos' => false,
            'nota' => false,
            'convocatorias' => false,
        );
        return $this->retornoRespuestaReporte($busqueda, 'PROYECTOS DE INVESTIGADORES INDEPENDIENTES', $request->rol, 'reporte_proyectos_investigadores_independientes_' . date('Y_m_d_h_i_s'), $datosMostrar);
    }

    public function proyectosTrabajoDeGrado(Request $request)
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
        $busqueda->where('proyecto.tipo_proyecto', 'Trabajo de Grado');
        $datosMostrar = array(
            'presupuestos' => false,
            'nota' => false,
            'convocatorias' => false,
        );
        return $this->retornoRespuestaReporte($busqueda, 'PROYECTOS TRABAJO DE GRADO', $request->rol, 'reporte_proyectos_trabajo_de_grado_' . date('Y_m_d_h_i_s'), $datosMostrar);
    }

    public function proyectosPorFacultad($id, Request $request)
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
        $busqueda->where('facultad.id', $id);
        $datosMostrar = array(
            'presupuestos' => false,
            'nota' => false,
            'convocatorias' => false,
        );
        return $this->retornoRespuestaReporte($busqueda, 'PROYECTOS DE FACULTAD', $request->rol, 'reporte_proyectos_investigadores_independientes_' . date('Y_m_d_h_i_s'), $datosMostrar);
    }

    public function proyectosPorPrograma($id, Request $request)
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
        $busqueda->where('programa.id', $id);
        $datosMostrar = array(
            'presupuestos' => false,
            'nota' => false,
            'convocatorias' => false,
        );
        return $this->retornoRespuestaReporte($busqueda, 'PROYECTOS POR PROGRAMA', $request->rol, 'reporte_proyectos_investigadores_independientes_' . date('Y_m_d_h_i_s'), $datosMostrar);
    }

    public function retornoRespuestaReporte($busqueda, $nombreReporte, $rolGeneraReporte, $nombreArchivoPdf, $arrDatosMostrar)
    {
        if ($busqueda) {

            $this->generarReportes($nombreReporte, $rolGeneraReporte, $busqueda->get(), $nombreArchivoPdf . date('Y_m_d_h_i_s'), $arrDatosMostrar);
            return response()->json([
                'success' => true,
                'mensaje' => 'Reporte generado con exito'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'proyectos' => [],
                'mensaje' => 'No hay resultados para esta búsqueda'
            ]);
        }
    }

    public function generarReportes($nombreReporte, $rolGeneraReporte, $dataReporte, $nombreArchivoPdf, $arrDatosMostrar)
    {
        $data = $dataReporte;
        $user = auth('api')->user();
        $dataHeader = array(
            "nombreReporte" => $nombreReporte,
            "nombreGeneraReporte" => $user->nombres . ' ' . $user->apellidos,
            "rolGeneraReporte" => $rolGeneraReporte,
            "codigoGeneraReporte" => $user->cod_universitario,
            "fechaActual" => date('Y-m-d H:i:s')
        );
        $datosMostrar = $arrDatosMostrar;
        $presupuestos = true;
        $pdf = Pdf::loadView('reportes.views.pdf-view', compact('dataHeader', 'data', 'datosMostrar'));
        $content = $pdf->download()->getOriginalContent();
        Storage::put('public/pdfs/' . $nombreArchivoPdf . '.pdf', $content);
    }
}
