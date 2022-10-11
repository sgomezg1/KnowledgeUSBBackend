<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToParticipacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participaciones', function (Blueprint $table) {
            $table->foreign(['evento_id'], 'fk_participaciones_evento')->references(['id'])->on('evento')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['proyecto_id_proyecto'], 'fk_participaciones_proyecto')->references(['id'])->on('proyecto')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('participaciones', function (Blueprint $table) {
            $table->dropForeign('fk_participaciones_evento');
            $table->dropForeign('fk_participaciones_proyecto');
        });
    }
}
