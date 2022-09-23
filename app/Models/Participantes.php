<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participantes extends Model
{
    use HasFactory;
    protected $table = 'participantes';
    protected $fillable = ['fecha_inicio', 'fecha_fin'];
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}
