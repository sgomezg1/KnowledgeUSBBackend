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
        if ($usuarios) {
            return response()->json([
                'success' => true,
                'usuarios' => $usuarios->get()
            ]);
        } else {
            return response()->json([
                'success' => false,
                'mensaje' => 'No hay usuarios en esta búsqueda'
            ]);
        }
    }

    public function getInvestigador($id)
    {
        $usuario = Usuario::select(['usuario.*'])
            ->with('participaciones.clases.materium.programa.facultad')
            ->where('usuario.cedula', $id);
        if ($usuario) {
            return response()->json([
                'success' => true,
                'usuario' => $usuario->get()
            ]);
        } else {
            return response()->json([
                'success' => false,
                'mensaje' => 'No hay usuarios en esta búsqueda'
            ]);
        }
    }
}
