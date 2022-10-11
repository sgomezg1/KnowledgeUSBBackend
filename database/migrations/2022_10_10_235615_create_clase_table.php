<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clase', function (Blueprint $table) {
            $table->increments('numero');
            $table->string('nombre', 45);
            $table->string('semestre', 45);
            $table->string('materia', 10)->index('fk_clase_materia_idx');
            $table->string('profesor', 20)->nullable()->index('fk_clase_usuario_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clase');
    }
}
