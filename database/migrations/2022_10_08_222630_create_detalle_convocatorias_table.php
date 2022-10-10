<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleConvocatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_convocatorias', function (Blueprint $table) {
            $table->id();
            $table->string('objetivos_convocatoria', 45);
            $table->string('requisitos', 45);
            $table->string('modalidad', 45);
            $table->bigInteger('convocatoria_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_convocatorias');
    }
}
