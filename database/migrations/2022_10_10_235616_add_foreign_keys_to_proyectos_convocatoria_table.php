<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProyectosConvocatoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyectos_convocatoria', function (Blueprint $table) {
            $table->foreign(['convocatoria'], 'fk_proyectos_convocatoria_convocatoria')->references(['id'])->on('convocatoria')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['proyectos'], 'fk_proyectos_convocatoria_proyecto')->references(['id'])->on('proyecto')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyectos_convocatoria', function (Blueprint $table) {
            $table->dropForeign('fk_proyectos_convocatoria_convocatoria');
            $table->dropForeign('fk_proyectos_convocatoria_proyecto');
        });
    }
}
