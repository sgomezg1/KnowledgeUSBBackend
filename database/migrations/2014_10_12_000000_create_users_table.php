<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('cedula');
            $table->bigInteger('cod_universitario');
            $table->string('correo_est', 45)->unique();
            $table->string('password');
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('telefono', 45);
            $table->string('visibilidad', 50);
            $table->boolean('acepta_politica')->default(false);
            $table->string('correo_personal', 45)->unique();
            $table->integer('semillero_id')->unsigned();
            $table->integer('programa_id')->unsigned();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
