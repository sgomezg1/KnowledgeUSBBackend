<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clase', function (Blueprint $table) {
            $table->foreign(['materia'], 'fk_clase_materia')->references(['catalogo'])->on('materia')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['profesor'], 'fk_clase_usuario')->references(['cedula'])->on('usuario')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clase', function (Blueprint $table) {
            $table->dropForeign('fk_clase_materia');
            $table->dropForeign('fk_clase_usuario');
        });
    }
}
