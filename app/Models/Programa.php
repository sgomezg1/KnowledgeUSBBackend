<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    use HasFactory;
    protected $table = 'programa';
    public function director()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function seminarios()
    {
        return $this->belongsToMany(Semillero::class, 'programas_semilleros', 'programa', 'semillero');
    }
}
