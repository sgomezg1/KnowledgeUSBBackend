<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvocatoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convocatoria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_convocatoria', 45);
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->longText('contexto');
            $table->string('numero_productos', 45)->nullable();
            $table->string('estado', 45);
            $table->string('tipo', 45);
            $table->string('entidad', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('convocatoria');
    }
}
