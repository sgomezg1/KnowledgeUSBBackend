<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Usuarios extends Pivot
{
    protected $table = 'usuarios';
    protected $fillable = ['usuario', 'tipo_usuario'];
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}
