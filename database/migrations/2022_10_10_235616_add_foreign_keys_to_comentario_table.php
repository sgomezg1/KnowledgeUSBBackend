<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToComentarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comentario', function (Blueprint $table) {
            $table->foreign(['producto_id'], 'fk_comentario_producto')->references(['id'])->on('producto')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comentario', function (Blueprint $table) {
            $table->dropForeign('fk_comentario_producto');
        });
    }
}
