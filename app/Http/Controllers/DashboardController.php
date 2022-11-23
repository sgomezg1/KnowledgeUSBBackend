<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

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
        /** select count(*) from (select a.* from proyecto as a inner join proyectos_clase as b on b.proyecto = a.id inner join clase as c on c.numero = b.clase inner join materia as d on d.catalogo = c.materia inner join programa as e on e.id = d.programa inner join facultad as f on f.id = e.facultad_id where a.estado = 'Finalizado') */


        /** select count(*) as total_finalizados from (select proyecto.* from proyecto inner join proyectos_clase on proyectos_clase.proyecto = proyecto.id inner join clase on clase.numero = proyectos_clase.clase inner join materia on materia.catalogo = clase.materia inner join programa on programa.id = materia.programa inner join facultad on facultad.id = programa.facultad_id where proyecto.estado = 'Finalizado'), count(*) as total_no_finalizados from (select proyecto.* from proyecto inner join proyectos_clase on proyectos_clase.proyecto = proyecto.id inner join clase on clase.numero = proyectos_clase.clase inner join materia on materia.catalogo = clase.materia inner join programa on programa.id = materia.programa inner join facultad on facultad.id = programa.facultad where proyecto.estado != 'Finalizado') */

        /* $sql = "select count(*) from (select `proyecto`.*, `facultad`.`nombre` as `nombre_facultad`, `programa`.`nombre` as `nombre_programa` from `proyecto` inner join `proyectos_clase` on `proyectos_clase`.`proyecto` = `proyecto`.`id` inner join `clase` on `clase`.`numero` = `proyectos_clase`.`clase` inner join `materia` on `materia`.`catalogo` = `clase`.`materia` inner join `programa` on `programa`.`id` = `materia`.`programa` inner join `facultad` on `facultad`.`id` = `programa`.`facultad_id` where proyecto.estado = 'Finalizado') as registros ";

        if ($request->facultad) {
            $facultades = implode(",", $request->facultad);
            $sql .= "where facultad.id in({$facultades}) ";
        }

        if ($request->programa) {
            $programas = implode(",", $request->programa);
            $sql .= "where programa.id in({$programas}) ";
        }
        dd($sql); */



        $busqueda = Proyecto::select([
            'proyecto.*'
        ])->whereHas('participantes')
            ->with([
                'participantes',
                'areaConocimientos',
                'clases.materium.programa.facultad'
            ]);
        if ($request->facultad) {
            $busqueda->whereHas('clases.materium.programa.facultad', function (Builder $q) use ($request) {
                $q->whereIn('facultad.id', $request->facultad);
            });
        }

        $busqueda->groupBy('proyecto.id');

        dd($busqueda->get()->count());
    }
}
