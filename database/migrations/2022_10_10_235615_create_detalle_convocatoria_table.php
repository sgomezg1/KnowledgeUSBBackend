<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleConvocatoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_convocatoria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('objetivos_convocatoria', 45);
            $table->string('requisitos', 45);
            $table->string('modalidade', 45);
            $table->integer('convocatoria_id')->index('fk_detalle_convocatoria_convocatoria_idx')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_convocatoria');
    }
}
