<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id('pedido_id'); // Primary key
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->dateTime('data_pedido');
            $table->decimal('total_pedido', 10, 2);
            $table->enum('status_pedido', ['pendente', 'em preparo', 'finalizado'])->default('pendente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
