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
 * Class LineaInvestigacion
 * 
 * @property string $nombre
 * @property string $descripcion
 * @property Carbon|null $fecha
 * 
 * @property Collection|GrupoInvLineasInv[] $grupo_inv_lineas_invs
 * @property Collection|Semillero[] $semilleros
 *
 * @package App\Models
 */
class LineaInvestigacion extends Model
{
	use HasFactory;

	protected $table = 'linea_investigacion';
	protected $primaryKey = 'nombre';
	public $incrementing = false;
	public $timestamps = false;

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'descripcion',
		'fecha'
	];

	public function grupo_inv_lineas_invs()
	{
		return $this->hasMany(GrupoInvLineasInv::class, 'linea_investigacion');
	}

	public function semilleros()
	{
		return $this->hasMany(Semillero::class, 'linea_investigacion');
	}
}
