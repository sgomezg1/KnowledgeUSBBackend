<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaConocimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_conocimiento', function (Blueprint $table) {
            $table->increments('id', true);
            $table->string('nombre', 100);
            $table->string('gran_area', 45)->nullable();
            $table->string('descripcion', 45);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_conocimiento');
    }
}
