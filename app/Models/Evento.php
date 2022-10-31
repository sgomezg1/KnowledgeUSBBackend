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
 * Class Evento
 * 
 * @property int $id
 * @property string $nombre
 * @property Carbon $fecha
 * @property string|null $entidad
 * @property string $estado
 * @property string|null $sitio_web
 * @property string|null $url_memoria
 * 
 * @property Collection|Participacione[] $participaciones
 *
 * @package App\Models
 */
class Evento extends Model
{
	use HasFactory;

	protected $table = 'evento';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'nombre',
		'fecha',
		'entidad',
		'estado',
		'sitio_web',
		'url_memoria'
	];

	public function participaciones()
	{
		return $this->belongsToMany(Proyecto::class, 'participaciones', 'evento_id', 'proyecto_id_proyecto');
	}
}
