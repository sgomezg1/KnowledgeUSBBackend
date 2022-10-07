<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100);
            $table->string('estado', 45);
            $table->longText('descripcion');
            $table->bigInteger('macro_proyecto')->unsigned();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->bigInteger('semillero')->unsigned()->nullable();
            $table->longText('retroalimentacion_final');
            $table->boolean('visibilidad');
            $table->string('ciudad', 45);
            $table->longText('metodologia');
            $table->longText('conclusiones')->nullable();
            $table->longText('justificacion');
            $table->bigInteger('tipo_proyecto')->unsigned();
            $table->timestamps();
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
