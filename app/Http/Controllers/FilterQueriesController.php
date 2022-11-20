<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class FilterQueriesController extends Controller
{
    public static function retornarFiltros($busqueda, Request $request, $tipo)
    {
        if ($tipo === 'proyecto') {
            if ($request->estado) {
                $busqueda->whereIn('estado', $request->estado);
            }
        }

        if ($request->facultad) {
            $busqueda->whereHas('clases.materium.programa.facultad', function (Builder $q) use ($request) {
                $q->whereIn('facultad.id', $request->facultad);
            });
        }

        if ($request->programa) {
            $busqueda->whereHas('clases.materium.programa', function (Builder $q) use ($request) {
                $q->whereIn('programa.id', $request->programa);
            });
        }

        if ($tipo === 'proyecto') {
            if ($request->areaConocimiento) {
                $busqueda->whereHas('areaConocimientos', function (Builder $q) use ($request) {
                    $q->whereIn('areas_conocimiento.area_conocimiento', $request->areaConocimiento);
                })->get();
            }
        }

        return $busqueda;
    }

    public static function retornarFiltrosSinAreaConocimiento($busqueda, Request $request)
    {
        if ($request->estado) {
            $busqueda->whereIn('estado', $request->estado);
        }

        if ($request->facultad) {
            $busqueda->whereIn('facultad.id', $request->facultad);
        }

        if ($request->programa) {
            $busqueda->whereIn('programa.id', $request->programa);
        }

        return $busqueda;
    }

    public static function retornarFiltrosSinFacultadYPrograma($busqueda, Request $request)
    {
        if ($request->estado) {
            $busqueda->whereIn('estado', $request->estado);
        }

        if ($request->areaConocimiento) {
            $busqueda->whereHas('areaConocimientos', function (Builder $q) use ($request) {
                $q->whereIn('areas_conocimiento.area_conocimiento', $request->areaConocimiento);
            })->get();
        }

        return $busqueda;
    }

    public static function retornarFiltrosSinPrograma($busqueda, Request $request)
    {
        if ($request->estado) {
            $busqueda->whereIn('estado', $request->estado);
        }

        if ($request->facultad) {
            $busqueda->whereIn('facultad.id', $request->facultad);
        }

        if ($request->areaConocimiento) {
            $busqueda->whereHas('areaConocimientos', function (Builder $q) use ($request) {
                $q->whereIn('areas_conocimiento.area_conocimiento', $request->areaConocimiento);
            })->get();
        }

        return $busqueda;
    }

    public static function retornarFiltrosSinFacultad($busqueda, Request $request)
    {
        if ($request->estado) {
            $busqueda->whereIn('estado', $request->estado);
        }

        if ($request->programa) {
            $busqueda->whereIn('programa.id', $request->programa);
        }

        if ($request->areaConocimiento) {
            $busqueda->whereHas('areaConocimientos', function (Builder $q) use ($request) {
                $q->whereIn('areas_conocimiento.area_conocimiento', $request->areaConocimiento);
            })->get();
        }

        return $busqueda;
    }
}
