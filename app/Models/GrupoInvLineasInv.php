<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GrupoInvLineasInv
 * 
 * @property int $grupo_investigacion
 * @property string $linea_investigacion
 * 
 *
 * @package App\Models
 */
class GrupoInvLineasInv extends Model
{
	use HasFactory;

	protected $table = 'grupo_inv_lineas_inv';
	protected $primaryKey = 'grupo_investigacion';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'grupo_investigacion' => 'int'
	];

	protected $fillable = [
		'linea_investigacion'
	];

	public function grupo_investigacion()
	{
		return $this->belongsTo(GrupoInvestigacion::class, 'grupo_investigacion');
	}

	public function linea_investigacion()
	{
		return $this->belongsTo(LineaInvestigacion::class, 'linea_investigacion');
	}
}
