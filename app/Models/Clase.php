<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Clase
 *
 * @property int $numero
 * @property string $nombre
 * @property string $semestre
 * @property string $materia
 * @property string|null $profesor
 *
 * @property Materium $materium
 * @property Usuario|null $usuario
 * @property Collection|Proyecto[] $proyectos
 *
 * @package App\Models
 */
class Clase extends Model
{
	use HasFactory;

	protected $table = 'clase';
	protected $primaryKey = 'numero';
	public $incrementing = false;
	public $timestamps = false;
    protected $hidden = ['pivot'];

	protected $casts = [
		'numero' => 'int'
	];

	protected $fillable = [
		'nombre',
		'semestre',
		'materia',
		'profesor'
	];

	public function materium()
	{
		return $this->belongsTo(Materium::class, 'materia');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'profesor');
	}

	public function proyectos()
	{
		return $this->belongsToMany(Proyecto::class, 'proyectos_clase', 'clase', 'proyecto');
	}
}
