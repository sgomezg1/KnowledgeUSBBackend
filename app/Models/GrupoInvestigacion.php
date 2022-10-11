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
 * Class GrupoInvestigacion
 * 
 * @property int $id
 * @property string $nombre
 * @property Carbon $fecha_fun
 * @property string $categoria
 * @property Carbon $fecha_cat
 * @property string|null $director_grupo
 * 
 * @property Usuario|null $usuario
 * @property GrupoInvLineasInv $grupo_inv_lineas_inv
 * @property Collection|ProgramasGruposInv[] $programas_grupos_invs
 * @property Collection|Semillero[] $semilleros
 *
 * @package App\Models
 */
class GrupoInvestigacion extends Model
{
	use HasFactory;

	protected $table = 'grupo_investigacion';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $dates = [
		'fecha_fun',
		'fecha_cat'
	];

	protected $fillable = [
		'nombre',
		'fecha_fun',
		'categoria',
		'fecha_cat',
		'director_grupo'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'director_grupo');
	}

	public function grupo_inv_lineas_inv()
	{
		return $this->hasOne(GrupoInvLineasInv::class, 'grupo_investigacion');
	}

	public function programas_grupos_invs()
	{
		return $this->hasMany(ProgramasGruposInv::class, 'grupo_investigacion');
	}

	public function semilleros()
	{
		return $this->hasMany(Semillero::class, 'grupo_investigacion');
	}
}
