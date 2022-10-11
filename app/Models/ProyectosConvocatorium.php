<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProyectosConvocatorium
 * 
 * @property int $proyectos
 * @property int $convocatoria
 * @property string $id_proyecto
 * 
 * @property Convocatorium $convocatorium
 * @property Proyecto $proyecto
 *
 * @package App\Models
 */
class ProyectosConvocatorium extends Model
{
	use HasFactory;

	protected $table = 'proyectos_convocatoria';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'proyectos' => 'int',
		'convocatoria' => 'int'
	];

	protected $fillable = [
		'id_proyecto'
	];

	public function convocatorium()
	{
		return $this->belongsTo(Convocatorium::class, 'convocatoria');
	}

	public function proyecto()
	{
		return $this->belongsTo(Proyecto::class, 'proyectos');
	}
}
