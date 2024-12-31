<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoItemTable extends Migration
{
    public function up()
    {
        Schema::create('pedido_item', function (Blueprint $table) {
            $table->id('pedido_item_id'); // Primary key
            $table->foreignId('pedido_id')->constrained('pedidos')->onDelete('cascade');
            $table->foreignId('pizza_id')->nullable()->constrained('pizzas')->onDelete('set null');
            $table->foreignId('bebida_id')->nullable()->constrained('bebidas')->onDelete('set null');
            $table->integer('quantidade');
            $table->decimal('preco_unitario', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedido_item');
    }
}
