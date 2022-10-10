<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoConvocatoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_convocatoria', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('proyectos')->unsigned();
            $table->bigInteger('convocatoria')->unsigned();
            $table->string('id_proyecto', 25);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyecto_convocatoria');
    }
}
