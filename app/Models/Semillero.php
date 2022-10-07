<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semillero extends Model
{
    use HasFactory;
    protected $table = 'semillero';

    public function programasSemilleros()
    {
        return $this->belongsToMany(Programa::class, 'programas_semilleros', 'semillero', 'programa');
    }

    public function lider()
    {
        return $this->hasOne(User::class, 'id', 'lider_semillero');
    }

    public function lineaInvestigacion()
    {
        return $this->hasOne(LineasDeInvestigacion::class, 'id', 'linea_investigacion');
    }

    public function grupoInvestigacion()
    {
        return $this->hasOne(GrupoInvestigacion::class, 'id', 'grupo_investigacion');
    }
}
