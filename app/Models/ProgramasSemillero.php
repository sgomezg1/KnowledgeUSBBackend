<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProgramasSemillero
 * 
 * @property int $programa
 * @property int $semillero
 * 
 *
 * @package App\Models
 */
class ProgramasSemillero extends Model
{
	use HasFactory;

	protected $table = 'programas_semilleros';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'programa' => 'int',
		'semillero' => 'int'
	];

	public function programa()
	{
		return $this->belongsTo(Programa::class, 'programa');
	}

	public function semillero()
	{
		return $this->belongsTo(Semillero::class, 'semillero');
	}
}
