<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramasSemilleros extends Model
{
    use HasFactory;
    protected $table = 'programas_semilleros';
    protected $fillable = ['programa', 'semillero'];
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}
