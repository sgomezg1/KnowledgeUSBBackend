<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Models\TipoUsuarios;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombres',
        'apellidos',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'pivot'
    ];

    public function tipoUsuarios()
    {
        return $this->belongsToMany(TipoUsuarios::class, 'usuarios', 'usuario', 'tipo_usuario');
    }

    public function proyectosParticipa()
    {
        return $this->hasMany(Participantes::class, 'usuario_id');
    }

    public function clase()
    {
        return $this->hasMany(Clase::class, 'profesor');
    }

    public function facultadDecano()
    {
        return $this->hasOne(Facultad::class, 'decano');
    }

    public function facultadCoordinadorInvestigacion()
    {
        return $this->hasOne(Facultad::class, 'coor_inv');
    }

    public function grupoInvestigacion()
    {
        return $this->hasOne(GrupoInvestigacion::class, 'director_grupo');
    }
}
