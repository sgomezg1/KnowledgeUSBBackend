<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BuscadorProyectosController extends Controller
{
    public function showProyectos(Request $request)
    {
        $buscador = Proyecto::select('*');
        if ($request->titulo) {
            $buscador->whereLike('titulo', $request->titulo);
        }

        if ($request->estado) {
            // $buscador->whereIn('estado', $request->estado);
        }
        
        if ($request->facultad) {
            // $buscador->whereHas()
        }

        if ($request->programa) {

        }

        if ($request->areaConocimiento) {
            /* $buscador->whereHas('areaConocimientos', function(Builder $q) use ($request) {
                $q->whereIn('area_conocimiento.nombre', $request->areaConocimiento);
            }); */
        }

        dd($buscador->get());


        return response()->json([
            'success' => true,
            'proyectos' => $buscador->paginate()
        ]);
    }
}
