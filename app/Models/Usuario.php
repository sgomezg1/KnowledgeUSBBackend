<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property string $usuario
 * @property string $tipo_usuario
 * 
 *
 * @package App\Models
 */
class Usuario extends Model
{
	use HasFactory;

	protected $table = 'usuario';
	public $incrementing = false;
	public $timestamps = false;

	public function tipo_usuario()
	{
		return $this->belongsTo(TipoUsuario::class, 'tipo_usuario');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuario');
	}
}
