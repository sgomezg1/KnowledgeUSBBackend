<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemilleroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semillero', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 45);
            $table->string('descripcion', 45);
            $table->date('fecha_fun');
            $table->integer('grupo_investigacion')->index('fk_semillero_grupo_investigacion_idx')->unsigned();
            $table->string('lider_semillero', 20)->nullable()->index('fk_semillero_usuario_idx');
            $table->string('linea_investigacion', 50)->index('fk_semillero_linea_investigacion_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semillero');
    }
}
