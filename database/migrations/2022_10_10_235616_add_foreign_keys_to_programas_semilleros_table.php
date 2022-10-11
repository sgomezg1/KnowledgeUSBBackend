<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProgramasSemillerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('programas_semilleros', function (Blueprint $table) {
            $table->foreign(['programa'], 'fk_programas_semillero_programa')->references(['id'])->on('programa')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['semillero'], 'fk_programas_semillero_semillero')->references(['id'])->on('semillero')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programas_semilleros', function (Blueprint $table) {
            $table->dropForeign('fk_programas_semillero_programa');
            $table->dropForeign('fk_programas_semillero_semillero');
        });
    }
}
