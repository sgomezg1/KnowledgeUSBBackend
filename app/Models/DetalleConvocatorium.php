<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleConvocatorium
 * 
 * @property int $id
 * @property string $objetivos_convocatoria
 * @property string $requisitos
 * @property string $modalidade
 * @property int $convocatoria_id
 * 
 * @property Convocatorium $convocatorium
 *
 * @package App\Models
 */
class DetalleConvocatorium extends Model
{
	use HasFactory;

	protected $table = 'detalle_convocatoria';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'convocatoria_id' => 'int'
	];

	protected $fillable = [
		'objetivos_convocatoria',
		'requisitos',
		'modalidade',
		'convocatoria_id'
	];

	public function convocatorium()
	{
		return $this->belongsTo(Convocatorium::class, 'convocatoria_id');
	}
}
