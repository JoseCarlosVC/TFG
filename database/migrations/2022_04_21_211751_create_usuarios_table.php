<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string("nombreUsuario");
            $table->string("apellidos");
            $table->string("correo")->unique();
            $table->date("fechaNacimiento");
            $table->string("direccion");
            $table->string("telefono");
            $table->string("password");
            $table->integer("rolUsuario");
            $table->string("foto")->nullable(true);
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
        Schema::dropIfExists('usuarios');
    }

};