<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProgramaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programa', function (Blueprint $table) {
            $table->foreign(['facultad_id'], 'fk_programa_facultad')->references(['id'])->on('facultad')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['director'], 'fk_programa_usuario')->references(['cedula'])->on('usuario')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programa', function (Blueprint $table) {
            $table->dropForeign('fk_programa_facultad');
            $table->dropForeign('fk_programa_usuario');
        });
    }
}
