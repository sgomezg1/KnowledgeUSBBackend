<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoInvLineasInvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_inv_lineas_inv', function (Blueprint $table) {
            $table->integer('grupo_investigacion')->index('fk_grupo_inv_lineas_inv_grupo_invest_idx')->unsigned();
            $table->string('linea_investigacion', 50)->index('fk_grupo_inv_lineas_inv_linea_invest_idx');

            $table->primary(['grupo_investigacion']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo_inv_lineas_inv');
    }
}
