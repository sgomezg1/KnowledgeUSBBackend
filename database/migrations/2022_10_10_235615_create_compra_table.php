<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_solicitud');
            $table->string('nombre', 45);
            $table->string('tipo', 45);
            $table->string('codigo_compra', 45)->nullable();
            $table->double('valor')->nullable();
            $table->date('fecha_compra')->nullable();
            $table->integer('estado');
            $table->string('link', 45)->nullable();
            $table->string('descripcion', 45);
            $table->integer('presupuesto')->index('fk_compra_presupuesto_idx')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compra');
    }
}
