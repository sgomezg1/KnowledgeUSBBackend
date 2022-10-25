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
 * Class Semillero
 * 
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property Carbon $fecha_fun
 * @property int $grupo_investigacion
 * @property string|null $lider_semillero
 * @property string $linea_investigacion
 * 
 * @property Usuario|null $usuario
 * @property Collection|Programa[] $programas
 * @property Collection|Proyecto[] $proyectos
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Semillero extends Model
{
	use HasFactory;

	protected $table = 'semillero';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'grupo_investigacion' => 'int'
	];

	protected $dates = [
		'fecha_fun'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'fecha_fun',
		'grupo_investigacion',
		'lider_semillero',
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

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'lider_semillero');
	}

	public function programasSemilleros()
	{
		return $this->belongsToMany(Programa::class, 'programas_semilleros', 'semillero', 'programa');
	}

	public function proyectos()
	{
		return $this->hasMany(Proyecto::class, 'semillero');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class);
	}
}
