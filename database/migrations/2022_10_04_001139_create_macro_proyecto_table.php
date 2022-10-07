<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMacroProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('macro_proyecto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 45);
            $table->longText('descripcion');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('estado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('macro_proyecto');
    }
}
