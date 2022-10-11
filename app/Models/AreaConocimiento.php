<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AreaConocimiento
 * 
 * @property int $id
 * @property string $nombre
 * @property string|null $gran_area
 * @property string $descripcion
 * 
 * @property Collection|AreasConocimiento[] $areas_conocimientos
 *
 * @package App\Models
 */
class AreaConocimiento extends Model
{
	use HasFactory;

	protected $table = 'area_conocimiento';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'nombre',
		'gran_area',
		'descripcion'
	];

	public function areas_conocimientos()
	{
		return $this->hasMany(AreasConocimiento::class, 'area_conocimiento');
	}
}
