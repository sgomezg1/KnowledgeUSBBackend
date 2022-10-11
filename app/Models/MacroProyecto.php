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
 * Class MacroProyecto
 * 
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property Carbon $fecha_inicio
 * @property Carbon|null $fecha_fin
 * @property string $estado
 * 
 * @property Collection|Proyecto[] $proyectos
 *
 * @package App\Models
 */
class MacroProyecto extends Model
{
	use HasFactory;

	protected $table = 'macro_proyecto';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $dates = [
		'fecha_inicio',
		'fecha_fin'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'fecha_inicio',
		'fecha_fin',
		'estado'
	];

	public function proyectos()
	{
		return $this->hasMany(Proyecto::class, 'macro_proyecto');
	}
}
