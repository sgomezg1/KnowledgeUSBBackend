<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comentario
 * 
 * @property int $id
 * @property string $comentario
 * @property float|null $calificacion
 * @property string $fase
 * @property string $nivel
 * @property Carbon $fecha
 * @property int $producto_id
 * 
 * @property Producto $producto
 *
 * @package App\Models
 */
class Comentario extends Model
{
	use HasFactory;

	protected $table = 'comentario';
	public $timestamps = false;

	protected $casts = [
		'calificacion' => 'float',
		'producto_id' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'comentario',
		'calificacion',
		'fase',
		'nivel',
		'fecha',
		'producto_id'
	];

	public function producto()
	{
		return $this->belongsTo(Producto::class);
	}
}
