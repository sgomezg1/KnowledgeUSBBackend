<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToGrupoInvLineasInvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grupo_inv_lineas_inv', function (Blueprint $table) {
            $table->foreign(['grupo_investigacion'], 'fk_grupo_inv_lineas_inv_grupo_invest')->references(['id'])->on('grupo_investigacion')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['linea_investigacion'], 'fk_grupo_inv_lineas_inv_linea_investig')->references(['nombre'])->on('linea_investigacion')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grupo_inv_lineas_inv', function (Blueprint $table) {
            $table->dropForeign('fk_grupo_inv_lineas_inv_grupo_invest');
            $table->dropForeign('fk_grupo_inv_lineas_inv_linea_investig');
        });
    }
}
