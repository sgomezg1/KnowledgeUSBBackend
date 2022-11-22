<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class InvestigadoresController extends Controller
{
    public function getinvestigadores(Request $request)
    {
        $usuarios = Usuario::select(['usuario.cedula', 'usuario.nombres', 'usuario.apellidos'])
            ->with('participaciones.clases.materium.programa.facultad');
        $usuarios = FilterQueriesController::retornarFiltros($usuarios, $request, 'investigador');
        //$usuarios->groupBy('usuario.cedula');
        //dd($usuarios->get());
        return response()->json($usuarios->get());
    }

    public function getInvestigador($id)
    {
        $usuario = Usuario::select(['usuario.*'])
            ->with('participaciones.clases.materium.programa.facultad')
            ->where('usuario.cedula', $id);
        return response()->json($usuario->get());
    }
}
