<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramasSemillerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programas_semilleros', function (Blueprint $table) {
            $table->integer('programa')->index('fk_programas_semillero_programa_idx')->unsigned();
            $table->integer('semillero')->index('fk_programas_semillero_semillero_idx')->unsigned();

            $table->primary(['programa', 'semillero']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programas_semilleros');
    }
}
