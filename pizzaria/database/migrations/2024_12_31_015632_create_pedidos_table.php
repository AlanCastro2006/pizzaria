<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id(); // ID do pedido
            $table->foreignId('usuario_id')
                  ->nullable()
                  ->constrained('usuarios')
                  ->onDelete('set null'); // Relaciona o pedido ao usuário (se existir), pode ficar nulo
            $table->decimal('total', 10, 2)->default(0); // Valor total do pedido
            $table->enum('status', ['pendente', 'preparando', 'em_entrega', 'finalizado', 'cancelado'])
                  ->default('pendente'); // Status do pedido
            $table->enum('tipo_entrega', ['retirada', 'entrega'])
                  ->default('retirada'); // Tipo de entrega
            $table->string('endereco_entrega')->nullable(); // Endereço para pedidos com entrega
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
