<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToDetalleConvocatoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detalle_convocatoria', function (Blueprint $table) {
            $table->foreign(['convocatoria_id'], 'fk_detalle_convocatoria_convocatoria')->references(['id'])->on('convocatoria')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detalle_convocatoria', function (Blueprint $table) {
            $table->dropForeign('fk_detalle_convocatoria_convocatoria');
        });
    }
}
