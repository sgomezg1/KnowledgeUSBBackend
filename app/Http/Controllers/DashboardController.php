<?php

namespace App\Http\Controllers;

use App\Models\Facultad;
use App\Models\Proyecto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    private $primerDiaDelAnio;
    private $ultimoDiaDelAnio;

    public function __construct()
    {
        $fecha = Carbon::createFromDate(date('Y'), date('m'), date('d'));
        $this->primerDiaDelAnio = $fecha->copy()->startOfYear()->format('Y-m-d');
        $this->ultimoDiaDelAnio = $fecha->copy()->endOfYear()->format('Y-m-d');
    }

    public function elementosDashboard()
    {
        // proyectos terminados/proyectos creados al anio
        $proyectosCreados = Proyecto::select('id')->whereBetween('fecha_inicio', [$this->primerDiaDelAnio, $this->ultimoDiaDelAnio])->count();
        $proyectosFinalizados = Proyecto::select('id')->where('estado', 'Finalizado')->whereBetween('fecha_inicio', [$this->primerDiaDelAnio, $this->ultimoDiaDelAnio])->count();
        $proyectosAula = Proyecto::select('id')->where('tipo_proyecto', 'Proyecto de Aula')->count();
        $proyectosGrado = Proyecto::select('id')->where('tipo_proyecto', 'Trabajo de Grado')->count();
        $proyectosSemillero = Proyecto::select('id')->whereNotNull('semillero')->count();
        $proyectosConvocatoria = Proyecto::select('id')->whereHas('convocatorias')->count();
        $proyectosInvIndependientes = Proyecto::select('id')->where('tipo_proyecto', 'Investigadores Independientes')->count();
        $proyectosPresupuesto = Proyecto::select('id')->whereHas('presupuestos')->count();

        $totalProyectosPsicologia = Proyecto::select('facultad.id', 'facultad.nombre')
            ->join('proyectos_clase', 'proyectos_clase.proyecto', 'proyecto.id')
            ->join('clase', 'clase.numero', 'proyectos_clase.clase')
            ->join('materia', 'materia.catalogo', 'clase.materia')
            ->join('programa', 'programa.id', 'materia.programa')
            ->join('facultad', 'facultad.id', 'programa.facultad_id')
            ->groupBy('facultad.id')
            ->where('facultad.id', '1')
            ->count();

        $totalProyectosHumanidades = Proyecto::select('facultad.id', 'facultad.nombre')
            ->join('proyectos_clase', 'proyectos_clase.proyecto', 'proyecto.id')
            ->join('clase', 'clase.numero', 'proyectos_clase.clase')
            ->join('materia', 'materia.catalogo', 'clase.materia')
            ->join('programa', 'programa.id', 'materia.programa')
            ->join('facultad', 'facultad.id', 'programa.facultad_id')
            ->groupBy('facultad.id')
            ->where('facultad.id', '2')
            ->count();

        $totalProyectosIngenieria = Proyecto::select('facultad.id', 'facultad.nombre')
            ->join('proyectos_clase', 'proyectos_clase.proyecto', 'proyecto.id')
            ->join('clase', 'clase.numero', 'proyectos_clase.clase')
            ->join('materia', 'materia.catalogo', 'clase.materia')
            ->join('programa', 'programa.id', 'materia.programa')
            ->join('facultad', 'facultad.id', 'programa.facultad_id')
            ->groupBy('facultad.id')
            ->where('facultad.id', '3')
            ->count();

        $totalProyectosEconomicas = Proyecto::select('facultad.id', 'facultad.nombre')
            ->join('proyectos_clase', 'proyectos_clase.proyecto', 'proyecto.id')
            ->join('clase', 'clase.numero', 'proyectos_clase.clase')
            ->join('materia', 'materia.catalogo', 'clase.materia')
            ->join('programa', 'programa.id', 'materia.programa')
            ->join('facultad', 'facultad.id', 'programa.facultad_id')
            ->groupBy('facultad.id')
            ->where('facultad.id', '4')
            ->count();

        $totalProyectosJuridicas = Proyecto::select('proyecto.id as pro_id', 'facultad.id', 'facultad.nombre')
            ->join('proyectos_clase', 'proyectos_clase.proyecto', 'proyecto.id')
            ->join('clase', 'clase.numero', 'proyectos_clase.clase')
            ->join('materia', 'materia.catalogo', 'clase.materia')
            ->join('programa', 'programa.id', 'materia.programa')
            ->join('facultad', 'facultad.id', 'programa.facultad_id')
            ->groupBy('facultad.id', 'proyecto.id')
            ->where('facultad.id', '5')
            ->count();

        $ranking = array(
            'psicologia' => $totalProyectosPsicologia,
            'humanidades' => $totalProyectosHumanidades,
            'ingenieria' => $totalProyectosIngenieria,
            'economicas' => $totalProyectosEconomicas,
            'juridicas' => $totalProyectosJuridicas,
        );

        array_multisort(array_values($ranking), SORT_DESC, array_keys($ranking), SORT_ASC, $ranking);

        return response()->json([
            'creados' => $proyectosCreados,
            'finalizados' => $proyectosFinalizados,
            'aula' => $proyectosAula,
            'grado' => $proyectosGrado,
            'semillero' => $proyectosSemillero,
            'convocatorias' => $proyectosConvocatoria,
            'inv_independientes' => $proyectosInvIndependientes,
            'presupuesto' => $proyectosPresupuesto,
            'ranking' => $ranking
        ]);
    }

    public function datosGraficaPresupuesto()
    {
    }

    public function datosGraficoProyectosFinalizadosPorFacultad(Request $request)
    {
        $arregloDatosGrafico = array();
        $facultades = Facultad::all();
        foreach ($facultades as $f) {
            $finalizados = 0;
            $noFinalizados = 0;
            $consultaNoFinalizados = DB::table('facultad')
                ->select(['facultad.id', 'facultad.nombre', DB::raw('count(*) as total_no_finalizados')])
                ->join('programa', 'facultad.id', 'programa.facultad_id')
                ->join('materia', 'programa.id', 'materia.programa')
                ->join('clase', 'materia.catalogo', 'clase.materia')
                ->join('proyectos_clase', 'clase.numero', 'proyectos_clase.clase')
                ->join('proyecto', 'proyectos_clase.proyecto', 'proyecto.id')
                ->where('proyecto.estado', '<>', 'Finalizado')
                ->where('facultad.id', $f->id)
                ->groupBy('facultad.id')
                ->get();


            $consultaFinalizados = DB::table('facultad')
                ->select(['facultad.id', 'facultad.nombre', DB::raw('count(*) as total_finalizados')])
                ->join('programa', 'facultad.id', 'programa.facultad_id')
                ->join('materia', 'programa.id', 'materia.programa')
                ->join('clase', 'materia.catalogo', 'clase.materia')
                ->join('proyectos_clase', 'clase.numero', 'proyectos_clase.clase')
                ->join('proyecto', 'proyectos_clase.proyecto', 'proyecto.id')
                ->where('proyecto.estado', '=', 'Finalizado')
                ->where('facultad.id', $f->id)
                ->groupBy('facultad.id')
                ->get();

            if ($consultaNoFinalizados->count() > 0) {
                $noFinalizados = $consultaNoFinalizados[0]->total_no_finalizados;
            }

            if ($consultaFinalizados->count() > 0) {
                $finalizados = $consultaFinalizados[0]->total_finalizados;
            }

            $arregloAuxiliar = array(
                "facultad" => $f->nombre,
                "finalizados" => $finalizados,
                "no_finalizados" => $noFinalizados
            );

            array_push($arregloDatosGrafico, $arregloAuxiliar);
        }
        return response()->json([
            "success" => true,
            "datos" => $arregloDatosGrafico
        ]);
    }
}
