<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participaciones', function (Blueprint $table) {
            $table->integer('evento_id')->index('fk_participaciones_evento_idx')->unsigned();
            $table->integer('proyecto_id_proyecto')->index('fk_participaciones_proyecto_idx')->unsigned();
            $table->date('fecha_part');
            $table->string('reconocimientos', 10)->nullable();

            $table->primary(['evento_id', 'proyecto_id_proyecto']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participaciones');
    }
}
