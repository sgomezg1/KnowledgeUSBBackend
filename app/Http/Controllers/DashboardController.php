<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Carbon\Carbon;
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

    public function valoresTarjetasDashboard()
    {
        // proyectos terminados/proyectos creados al anio
        dd(Proyecto::inRandomOrder()->first()->facultad);
        $proyectosCreados = Proyecto::select('id')->count();
        $proyectosFinalizados = Proyecto::select('id')->where('estado', 'Finalizado')->count();
        return response()->json([
            'creados' => $proyectosCreados,
            'finalizados' => $proyectosFinalizados
        ]);
    }
}
