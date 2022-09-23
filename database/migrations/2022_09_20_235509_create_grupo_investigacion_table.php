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
            $table->id();
            $table->string('nombre');
            $table->date('fecha_fun');
            $table->string('categoria', 45);
            $table->date('fecha_cat');
            $table->bigInteger('director_grupo')->unsigned();
            $table->timestamps();
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
