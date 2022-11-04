<?php

namespace App\Http\Controllers;

use App\Models\AreaConocimiento;
use App\Models\Facultad;
use App\Models\Programa;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function consultarFiltros() {
        $estados = array('En Propuesta', 'En Desarrollo', 'En Correcciones', 'Finalizado');
        $facultades = Facultad::select(['id', 'nombre'])->get();
        $programas = Programa::select(['id', 'nombre'])->get();
        $areasConocimiento = AreaConocimiento::select(['id', 'nombre'])->get();
        return response()->json([
            'estados' => $estados,
            'facultades' => $facultades,
            'programas' => $programas,
            'areasConocimiento' => $areasConocimiento
        ]); 
    }
}
