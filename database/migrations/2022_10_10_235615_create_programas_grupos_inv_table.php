<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramasGruposInvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programas_grupos_inv', function (Blueprint $table) {
            $table->integer('programa')->index('fk_programas_grupos_inv_programa_idx')->unsigned();
            $table->integer('grupo_investigacion')->index('fk_programas_grupos_inv_grupo_investigacion_idx')->unsigned();

            $table->primary(['programa', 'grupo_investigacion']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programas_grupos_inv');
    }
}
