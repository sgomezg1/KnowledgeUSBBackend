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
 * Class Proyecto
 * 
 * @property int $id
 * @property string $titulo
 * @property string $estado
 * @property string $descripcion
 * @property int|null $macro_proyecto
 * @property Carbon $fecha_inicio
 * @property Carbon|null $fecha_fin
 * @property int|null $semillero
 * @property string|null $retroalimentacion_final
 * @property int $visibilidad
 * @property string $ciudad
 * @property string $metodologia
 * @property string|null $conclusiones
 * @property string $justificacion
 * @property string $tipo_proyecto
 * 
 * @property Collection|Antecedente[] $antecedentes
 * @property Collection|AreasConocimiento[] $areas_conocimientos
 * @property Collection|Participacione[] $participaciones
 * @property Collection|Participante[] $participantes
 * @property Collection|Presupuesto[] $presupuestos
 * @property Collection|Producto[] $productos
 * @property Collection|Clase[] $clases
 * @property Collection|ProyectosConvocatorium[] $proyectos_convocatoria
 *
 * @package App\Models
 */
class Proyecto extends Model
{
	use HasFactory;

	protected $table = 'proyecto';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'macro_proyecto' => 'int',
		'semillero' => 'int',
		'visibilidad' => 'int'
	];

	protected $dates = [
		'fecha_inicio',
		'fecha_fin'
	];

	protected $fillable = [
		'titulo',
		'estado',
		'descripcion',
		'macro_proyecto',
		'fecha_inicio',
		'fecha_fin',
		'semillero',
		'retroalimentacion_final',
		'visibilidad',
		'ciudad',
		'metodologia',
		'conclusiones',
		'justificacion',
		'tipo_proyecto'
	];

	public function macro_proyecto()
	{
		return $this->belongsTo(MacroProyecto::class, 'macro_proyecto');
	}

	public function semillero()
	{
		return $this->belongsTo(Semillero::class, 'semillero');
	}

	public function tipo_proyecto()
	{
		return $this->belongsTo(TipoProyecto::class, 'tipo_proyecto');
	}

	public function antecedentes()
	{
		return $this->hasMany(Antecedente::class, 'proyecto');
	}

	public function areaConocimientos()
	{
		return $this->belongsToMany(AreaConocimiento::class, 'areas_conocimiento', 'proyecto', 'area_conocimiento');
	}

	public function participaciones()
	{
		return $this->belongsToMany(Evento::class, 'participaciones', 'proyecto_id_proyecto', 'evento_id');
	}

	public function participantes()
	{
		return $this->belongsToMany(Usuario::class, 'participantes', 'proyecto', 'usuario');
	}

	public function presupuestos()
	{
		return $this->hasMany(Presupuesto::class, 'proyecto');
	}

	public function productos()
	{
		return $this->hasMany(Producto::class, 'proyecto');
	}

	public function clases()
	{
		return $this->belongsToMany(Clase::class, 'proyectos_clase', 'proyecto', 'clase');
	}

	public function convocatorias()
	{
		return $this->belongsToMany(Convocatorium::class, 'proyectos_convocatoria', 'proyectos', 'convocatoria');
	}

	public function scopeWhereLike($query, $column, $value)
	{
		return $query->where($column, 'like', '%'. $value .'%');
	}

	public function facultad($query)
	{
		// return $query->
	}

	public function programa($query)
	{

	}
}
