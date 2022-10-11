<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosClaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos_clase', function (Blueprint $table) {
            $table->integer('proyecto')->index('fk_proyectos_clase_proyecto_idx')->unsigned();
            $table->integer('clase')->index('fk_proyectos_clase_clase_idx')->unsigned();

            $table->primary(['clase', 'proyecto']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos_clase');
    }
}
