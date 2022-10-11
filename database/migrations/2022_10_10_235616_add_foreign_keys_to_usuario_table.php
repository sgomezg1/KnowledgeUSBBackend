<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuario', function (Blueprint $table) {
            $table->foreign(['programa_id'], 'fk_usuario_programa')->references(['id'])->on('programa')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['semillero_id'], 'fk_usuario_semillero')->references(['id'])->on('semillero')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuario', function (Blueprint $table) {
            $table->dropForeign('fk_usuario_programa');
            $table->dropForeign('fk_usuario_semillero');
        });
    }
}
