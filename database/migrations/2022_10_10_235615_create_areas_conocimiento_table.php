<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasConocimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas_conocimiento', function (Blueprint $table) {
            $table->integer('proyecto')->index('fk_areas_conocimiento_proyecto_idx')->unsigned();
            $table->integer('area_conocimiento')->index('fk_areas_conocimiento_area_conocimiento_idx')->unsigned();

            $table->primary(['proyecto', 'area_conocimiento']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas_conocimiento');
    }
}
