<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProyectosClase
 *
 * @property int $proyecto
 * @property int $clase
 *
 *
 * @package App\Models
 */
class ProyectosClase extends Model
{
	use HasFactory;

	protected $table = 'proyectos_clase';
	public $incrementing = false;
	public $timestamps = false;
    protected $hidden = ['pivot'];

	protected $casts = [
		'proyecto' => 'int',
		'clase' => 'int'
	];

	public function clase()
	{
		return $this->belongsTo(Clase::class, 'clase');
	}

	public function proyecto()
	{
		return $this->belongsTo(Proyecto::class, 'proyecto');
	}
}
