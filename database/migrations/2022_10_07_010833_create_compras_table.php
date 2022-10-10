<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_solicitud');
            $table->string('nombre', 45);
            $table->string('tipo', 45);
            $table->string('codigo_compra', 45);
            $table->double('valor');
            $table->date('fecha_compra');
            $table->integer('estado');
            $table->text('link');
            $table->string('descripcion');
            $table->double('presupuesto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
