<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoProyecto
 * 
 * @property string $nombre
 * @property string $descripcion
 * 
 * @property Collection|Proyecto[] $proyectos
 *
 * @package App\Models
 */
class TipoProyecto extends Model
{
	use HasFactory;

	protected $table = 'tipo_proyecto';
	protected $primaryKey = 'nombre';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'descripcion'
	];

	public function proyectos()
	{
		return $this->hasMany(Proyecto::class, 'tipo_proyecto');
	}
}
