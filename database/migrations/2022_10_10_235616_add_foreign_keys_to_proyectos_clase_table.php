<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProyectosClaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyectos_clase', function (Blueprint $table) {
            $table->foreign(['clase'], 'fk_proyectos_clase_clase')->references(['numero'])->on('clase')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['proyecto'], 'fk_proyectos_clase_proyecto')->references(['id'])->on('proyecto')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyectos_clase', function (Blueprint $table) {
            $table->dropForeign('fk_proyectos_clase_clase');
            $table->dropForeign('fk_proyectos_clase_proyecto');
        });
    }
}
