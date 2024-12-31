<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoItemTable extends Migration
{
    public function up()
{
    Schema::create('pedido_item', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('pedido_id');
        $table->unsignedBigInteger('pizza_id')->nullable();
        $table->unsignedBigInteger('bebida_id')->nullable();
        $table->integer('quantidade')->default(1);
        $table->decimal('preco', 8, 2);
        $table->timestamps();

        $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
        $table->foreign('pizza_id')->references('id')->on('pizzas')->onDelete('cascade');
        $table->foreign('bebida_id')->references('id')->on('bebidas')->onDelete('cascade');
    });
}


    public function down()
    {
        Schema::dropIfExists('pedido_item');
    }
}
