<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Compra
 * 
 * @property int $id
 * @property Carbon $fecha_solicitud
 * @property string $nombre
 * @property string $tipo
 * @property string|null $codigo_compra
 * @property float|null $valor
 * @property Carbon|null $fecha_compra
 * @property int $estado
 * @property string|null $link
 * @property string $descripcion
 * @property int $presupuesto
 * 
 *
 * @package App\Models
 */
class Compra extends Model
{
	use HasFactory;

	protected $table = 'compra';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'valor' => 'float',
		'estado' => 'int',
		'presupuesto' => 'int'
	];

	protected $dates = [
		'fecha_solicitud',
		'fecha_compra'
	];

	protected $fillable = [
		'fecha_solicitud',
		'nombre',
		'tipo',
		'codigo_compra',
		'valor',
		'fecha_compra',
		'estado',
		'link',
		'descripcion',
		'presupuesto'
	];

	public function presupuesto()
	{
		return $this->belongsTo(Presupuesto::class, 'presupuesto');
	}
}
