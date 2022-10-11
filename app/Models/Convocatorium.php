<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Convocatorium
 * 
 * @property int $id
 * @property string $nombre_convocatoria
 * @property Carbon $fecha_inicio
 * @property Carbon $fecha_final
 * @property string $contexto
 * @property string|null $numero_productos
 * @property string $estado
 * @property string $tipo
 * @property string|null $entidad
 * 
 * @property Collection|DetalleConvocatorium[] $detalle_convocatoria
 * @property Collection|ProyectosConvocatorium[] $proyectos_convocatoria
 *
 * @package App\Models
 */
class Convocatorium extends Model
{
	use HasFactory;

	protected $table = 'convocatoria';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $dates = [
		'fecha_inicio',
		'fecha_final'
	];

	protected $fillable = [
		'nombre_convocatoria',
		'fecha_inicio',
		'fecha_final',
		'contexto',
		'numero_productos',
		'estado',
		'tipo',
		'entidad'
	];

	public function detalle_convocatoria()
	{
		return $this->hasMany(DetalleConvocatorium::class, 'convocatoria_id');
	}

	public function proyectos_convocatoria()
	{
		return $this->hasMany(ProyectosConvocatorium::class, 'convocatoria');
	}
}
