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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->foreignId("idPedido");
            $table->foreign("idPedido")->references('id')->on('usuario__pedidos')->onDelete('cascade');
            $table->foreignId("idProducto");
            $table->foreign("idProducto")->references('id')->on('productos')->onDelete('cascade');
            $table->integer("cantidad");
            $table->float("precio",5,2);
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
        Schema::dropIfExists('pedidos');
    }
};
