<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 100);
            $table->string('estado', 45);
            $table->longText('descripcion');
            $table->integer('macro_proyecto')->nullable()->index('fk_proyecto_macro_proyecto_idx')->unsigned();
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable();
            $table->integer('semillero')->nullable()->index('fk_proyecto_semillero_idx')->unsigned();
            $table->longText('retroalimentacion_final')->nullable();
            $table->tinyInteger('visibilidad');
            $table->string('ciudad', 45);
            $table->longText('metodologia');
            $table->longText('conclusiones')->nullable();
            $table->longText('justificacion');
            $table->string('tipo_proyecto', 45)->index('fk_proyecto_tipo_proyecto1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto');
    }
}
