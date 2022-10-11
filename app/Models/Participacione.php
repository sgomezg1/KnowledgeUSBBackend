<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Participacione
 * 
 * @property int $evento_id
 * @property int $proyecto_id_proyecto
 * @property Carbon $fecha_part
 * @property string|null $reconocimientos
 * 
 * @property Evento $evento
 * @property Proyecto $proyecto
 *
 * @package App\Models
 */
class Participacione extends Model
{
	use HasFactory;

	protected $table = 'participaciones';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'evento_id' => 'int',
		'proyecto_id_proyecto' => 'int'
	];

	protected $dates = [
		'fecha_part'
	];

	protected $fillable = [
		'fecha_part',
		'reconocimientos'
	];

	public function evento()
	{
		return $this->belongsTo(Evento::class);
	}

	public function proyecto()
	{
		return $this->belongsTo(Proyecto::class, 'proyecto_id_proyecto');
	}
}
