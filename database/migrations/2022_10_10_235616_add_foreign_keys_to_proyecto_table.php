<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyecto', function (Blueprint $table) {
            $table->foreign(['macro_proyecto'], 'fk_proyecto_macro_proyecto')->references(['id'])->on('macro_proyecto')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['tipo_proyecto'], 'fk_proyecto_tipo_proyecto1')->references(['nombre'])->on('tipo_proyecto')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['semillero'], 'fk_proyecto_semillero')->references(['id'])->on('semillero')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyecto', function (Blueprint $table) {
            $table->dropForeign('fk_proyecto_macro_proyecto');
            $table->dropForeign('fk_proyecto_tipo_proyecto1');
            $table->dropForeign('fk_proyecto_semillero');
        });
    }
}
