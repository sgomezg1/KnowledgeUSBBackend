<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AreasConocimiento
 * 
 * @property int $proyecto
 * @property int $area_conocimiento
 * 
 *
 * @package App\Models
 */
class AreasConocimiento extends Model
{
	use HasFactory;

	protected $table = 'areas_conocimiento';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'proyecto' => 'int',
		'area_conocimiento' => 'int'
	];

	public function area_conocimiento()
	{
		return $this->belongsTo(AreaConocimiento::class, 'area_conocimiento');
	}

	public function proyecto()
	{
		return $this->belongsTo(Proyecto::class, 'proyecto');
	}
}
