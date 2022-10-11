<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->string('cedula', 20)->primary();
            $table->bigInteger('cod_universitario')->unique('cod_estudiantil_UNIQUE');
            $table->string('correo_est', 45)->unique('correo_est_UNIQUE');
            $table->string('contrasena', 100);
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('telefono', 45)->nullable();
            $table->string('visibilidad', 50);
            $table->string('correo_personal', 45)->nullable();
            $table->integer('semillero_id')->nullable()->index('fk_usuario_semillero_idx')->unsigned();
            $table->integer('programa_id')->index('fk_usuario_programa_idx')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
