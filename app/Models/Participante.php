<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Participante
 * 
 * @property string $usuario
 * @property int $proyecto
 * @property Carbon $fecha_inicio
 * @property Carbon|null $fecha_fin
 * @property string $rol
 * 
 *
 * @package App\Models
 */
class Participante extends Model
{
	use HasFactory;

	protected $table = 'participantes';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'proyecto' => 'int'
	];

	protected $dates = [
		'fecha_inicio',
		'fecha_fin'
	];

	protected $fillable = [
		'fecha_fin',
		'rol'
	];

	public function proyecto()
	{
		return $this->belongsTo(Proyecto::class, 'proyecto');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuario');
	}
}
