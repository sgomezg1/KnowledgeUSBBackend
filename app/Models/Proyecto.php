<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $table = 'proyecto';
    public $timestamps = false;

    public function productos()
    {
        return $this->hasMany(Producto::class, 'proyecto', 'id');
    }
}
