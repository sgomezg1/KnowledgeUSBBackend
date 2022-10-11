<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAreasConocimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('areas_conocimiento', function (Blueprint $table) {
            $table->foreign(['area_conocimiento'], 'fk_areas_conocimiento_area_conocimiento')->references(['id'])->on('area_conocimiento')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['proyecto'], 'fk_areas_conocimiento_proyecto')->references(['id'])->on('proyecto')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('areas_conocimiento', function (Blueprint $table) {
            $table->dropForeign('fk_areas_conocimiento_area_conocimiento');
            $table->dropForeign('fk_areas_conocimiento_proyecto');
        });
    }
}
