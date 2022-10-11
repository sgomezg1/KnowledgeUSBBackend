<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupoInvestigacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo_investigacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 45);
            $table->date('fecha_fun');
            $table->string('categoria', 45);
            $table->date('fecha_cat');
            $table->string('director_grupo', 20)->nullable()->index('fk_grupo_investigacion_usuario_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupo_investigacion');
    }
}
