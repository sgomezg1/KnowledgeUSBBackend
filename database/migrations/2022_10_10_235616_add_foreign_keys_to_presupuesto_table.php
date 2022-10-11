<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPresupuestoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('presupuesto', function (Blueprint $table) {
            $table->foreign(['proyecto'], 'fk_presupuesto_proyecto')->references(['id'])->on('proyecto')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('presupuesto', function (Blueprint $table) {
            $table->dropForeign('fk_presupuesto_proyecto');
        });
    }
}
