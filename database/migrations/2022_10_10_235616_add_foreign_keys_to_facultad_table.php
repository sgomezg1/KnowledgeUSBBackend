<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFacultadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('facultad', function (Blueprint $table) {
            $table->foreign(['coor_inv'], 'fk_facultad_usuario_coor_inv')->references(['cedula'])->on('usuario')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['decano'], 'fk_facultad_usuario_decano')->references(['cedula'])->on('usuario')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('facultad', function (Blueprint $table) {
            $table->dropForeign('fk_facultad_usuario_coor_inv');
            $table->dropForeign('fk_facultad_usuario_decano');
        });
    }
}
