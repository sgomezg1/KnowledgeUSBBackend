<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

/**
 * Class Usuario
 * 
 * @property string $usuario
 * @property string $tipo_usuario
 * 
 *
 * @package App\Models
 */
class Usuario extends Authenticatable
{
	use HasFactory;
	use HasApiTokens;

	protected $table = 'usuario';
	protected $primaryKey = 'cedula';
	public $incrementing = false;
	public $timestamps = false;

	protected $hidden = [
		'password',
		'pivot',
		'acepta_politicas',
		'visibilidad'
	];

	public function tipoUsuarios()
	{
		return $this->belongsToMany(TipoUsuario::class, 'usuarios', 'usuario', 'tipo_usuario');
	}

	public function participaciones()
	{
		return $this->belongsToMany(Proyecto::class, 'participantes', 'usuario', 'proyecto');
	}

	public function SetPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

	public function scopeWhereLike($query, $column, $value)
	{
		return $query->where($column, 'like', '%' . $value . '%');
	}
}
