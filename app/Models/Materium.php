<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Materium
 * 
 * @property string $catalogo
 * @property string $nombre
 * @property int $programa
 * 
 * @property Collection|Clase[] $clases
 *
 * @package App\Models
 */
class Materium extends Model
{
	use HasFactory;

	protected $table = 'materia';
	protected $primaryKey = 'catalogo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'programa' => 'int'
	];

	protected $fillable = [
		'nombre',
		'programa'
	];

	public function programa()
	{
		return $this->belongsTo(Programa::class, 'programa');
	}

	public function clases()
	{
		return $this->hasMany(Clase::class, 'materia');
	}
}
