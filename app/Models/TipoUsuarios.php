<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuarios extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function usuarios()
    {
        return $this->belongsToMany(User::class, null, 'usuarios', 'tipo_usuario', 'usuario');
    }
}
