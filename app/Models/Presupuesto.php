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
 * Class Presupuesto
 * 
 * @property int $id
 * @property float $monto
 * @property Carbon $fecha
 * @property int $proyecto
 * @property string|null $descripcion
 * 
 * @property Collection|Compra[] $compras
 *
 * @package App\Models
 */
class Presupuesto extends Model
{
	use HasFactory;

	protected $table = 'presupuesto';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'monto' => 'float',
		'proyecto' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'monto',
		'fecha',
		'proyecto',
		'descripcion'
	];

	public function proyecto()
	{
		return $this->belongsTo(Proyecto::class, 'proyecto');
	}

	public function compras()
	{
		return $this->hasMany(Compra::class, 'presupuesto');
	}
}
