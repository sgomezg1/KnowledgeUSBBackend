<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Programa
 *
 * @property int $id
 * @property string $nombre
 * @property int $facultad_id
 * @property string|null $director
 *
 * @property Facultad $facultad
 * @property Usuario|null $usuario
 * @property Collection|Materium[] $materia
 * @property Collection|ProgramasGruposInv[] $programas_grupos_invs
 * @property Collection|Semillero[] $semilleros
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Programa extends Model
{
    use HasFactory;

    protected $table = 'programa';
    public $incrementing = false;
    public $timestamps = false;
    protected $hidden = ['pivot'];

    protected $casts = [
        'id' => 'int',
        'facultad_id' => 'int'
    ];

    protected $fillable = [
        'nombre',
        'facultad_id',
        'director'
    ];

    public function facultad()
    {
        return $this->belongsTo(Facultad::class, 'facultad_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'director');
    }

    public function materia()
    {
        return $this->hasMany(Materium::class, 'programa');
    }

    public function programas_grupos_invs()
    {
        return $this->hasMany(ProgramasGruposInv::class, 'programa');
    }

    public function semillerosProgramas()
    {
        return $this->belongsToMany(Semillero::class, 'programas_semilleros', 'programa', 'semillero');
    }

    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
}
