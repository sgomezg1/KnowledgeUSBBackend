<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToGrupoInvestigacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('grupo_investigacion', function (Blueprint $table) {
            $table->foreign(['director_grupo'], 'fk_grupo_investigacion_usuario')->references(['cedula'])->on('usuario')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('grupo_investigacion', function (Blueprint $table) {
            $table->dropForeign('fk_grupo_investigacion_usuario');
        });
    }
}
