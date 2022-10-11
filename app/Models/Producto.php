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
 * Class Producto
 * 
 * @property int $id
 * @property string $titulo_producto
 * @property string $tipo_producto
 * @property string $url_repo
 * @property Carbon $fecha
 * @property int $proyecto
 * 
 * @property Collection|Comentario[] $comentarios
 *
 * @package App\Models
 */
class Producto extends Model
{
	use HasFactory;

	protected $table = 'producto';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'proyecto' => 'int'
	];

	protected $dates = [
		'fecha'
	];

	protected $fillable = [
		'titulo_producto',
		'tipo_producto',
		'url_repo',
		'fecha',
		'proyecto'
	];

	public function proyecto()
	{
		return $this->belongsTo(Proyecto::class, 'proyecto');
	}

	public function comentarios()
	{
		return $this->hasMany(Comentario::class);
	}
}
