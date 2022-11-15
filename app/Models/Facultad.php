<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Facultad
 *
 * @property int $id
 * @property string $nombre
 * @property string|null $decano
 * @property string|null $coor_inv
 *
 * @property Usuario|null $usuario
 * @property Collection|Programa[] $programas
 *
 * @package App\Models
 */
class Facultad extends Model
{
	use HasFactory;

	protected $table = 'facultad';
	public $timestamps = false;
    protected $hidden = ['pivot'];

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'nombre',
		'decano',
		'coor_inv'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'decano');
	}

	public function programas()
	{
		return $this->hasMany(Programa::class);
	}
}
