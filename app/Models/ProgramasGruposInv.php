<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProgramasGruposInv
 * 
 * @property int $programa
 * @property int $grupo_investigacion
 * 
 *
 * @package App\Models
 */
class ProgramasGruposInv extends Model
{
	use HasFactory;

	protected $table = 'programas_grupos_inv';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'programa' => 'int',
		'grupo_investigacion' => 'int'
	];

	public function grupo_investigacion()
	{
		return $this->belongsTo(GrupoInvestigacion::class, 'grupo_investigacion');
	}

	public function programa()
	{
		return $this->belongsTo(Programa::class, 'programa');
	}
}
