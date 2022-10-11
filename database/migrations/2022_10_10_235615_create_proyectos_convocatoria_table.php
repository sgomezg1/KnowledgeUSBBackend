<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosConvocatoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos_convocatoria', function (Blueprint $table) {
            $table->integer('proyectos')->index('fk_proyectos_convocatoria_Proyecto_idx')->unsigned();
            $table->integer('convocatoria')->index('fk_proyectos_convocatoria_convocatoria_idx')->unsigned();
            $table->string('id_proyecto', 25);

            $table->primary(['proyectos', 'convocatoria']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos_convocatoria');
    }
}
