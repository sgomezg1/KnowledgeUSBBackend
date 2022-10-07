<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'producto';
    public $timestamps = false;

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'producto_id', 'id');
    }
}
