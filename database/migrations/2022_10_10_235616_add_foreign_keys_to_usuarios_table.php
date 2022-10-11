<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->foreign(['tipo_usuario'], 'fk_usuarios_tipo_usuario')->references(['nombre'])->on('tipo_usuario')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['usuario'], 'fk_usuarios_usuario')->references(['cedula'])->on('usuario')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign('fk_usuarios_tipo_usuario');
            $table->dropForeign('fk_usuarios_usuario');
        });
    }
}
