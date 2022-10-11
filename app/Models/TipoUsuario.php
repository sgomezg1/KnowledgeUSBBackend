<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoUsuario
 * 
 * @property string $nombre
 * @property string $descripcion
 * 
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class TipoUsuario extends Model
{
	use HasFactory;
	protected $table = 'tipo_usuario';
	protected $primaryKey = 'nombre';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'descripcion'
	];

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'tipo_usuario');
	}
}
