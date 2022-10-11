<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Antecedente
 * 
 * @property int $proyecto
 * @property int $ancedente
 * 
 *
 * @package App\Models
 */
class Antecedente extends Model
{
	use HasFactory;

	protected $table = 'antecedentes';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'proyecto' => 'int',
		'ancedente' => 'int'
	];

	public function proyecto()
	{
		return $this->belongsTo(Proyecto::class, 'proyecto');
	}
}
