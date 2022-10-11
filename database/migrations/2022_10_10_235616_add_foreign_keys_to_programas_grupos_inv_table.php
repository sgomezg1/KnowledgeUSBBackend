<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProgramasGruposInvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programas_grupos_inv', function (Blueprint $table) {
            $table->foreign(['grupo_investigacion'], 'fk_programas_grupos_inv_grupo_investigacion')->references(['id'])->on('grupo_investigacion')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['programa'], 'fk_programas_grupos_inv_programa')->references(['id'])->on('programa')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programas_grupos_inv', function (Blueprint $table) {
            $table->dropForeign('fk_programas_grupos_inv_grupo_investigacion');
            $table->dropForeign('fk_programas_grupos_inv_programa');
        });
    }
}
