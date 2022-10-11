<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAntecedentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('antecedentes', function (Blueprint $table) {
            $table->foreign(['ancedente'], 'fk_antecedentes_proyecto_antecedente')->references(['id'])->on('proyecto')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['proyecto'], 'fk_antecedentes_proyecto_proyecto')->references(['id'])->on('proyecto')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('antecedentes', function (Blueprint $table) {
            $table->dropForeign('fk_antecedentes_proyecto_antecedente');
            $table->dropForeign('fk_antecedentes_proyecto_proyecto');
        });
    }
}
