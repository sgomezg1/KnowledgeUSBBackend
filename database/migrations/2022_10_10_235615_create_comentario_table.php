<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('comentario');
            $table->double('calificacion')->nullable();
            $table->string('fase', 45);
            $table->string('nivel', 45);
            $table->date('fecha');
            $table->integer('producto_id')->index('fk_comentario_producto_idx')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentario');
    }
}
