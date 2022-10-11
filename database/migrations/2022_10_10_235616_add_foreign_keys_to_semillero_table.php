<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToSemilleroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('semillero', function (Blueprint $table) {
            $table->foreign(['grupo_investigacion'], 'fk_semillero_grupo_investigacion')->references(['id'])->on('grupo_investigacion')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['lider_semillero'], 'fk_semillero_usuario')->references(['cedula'])->on('usuario')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['linea_investigacion'], 'fk_semillero_linea_investigacion')->references(['nombre'])->on('linea_investigacion')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('semillero', function (Blueprint $table) {
            $table->dropForeign('fk_semillero_grupo_investigacion');
            $table->dropForeign('fk_semillero_usuario');
            $table->dropForeign('fk_semillero_linea_investigacion');
        });
    }
}
