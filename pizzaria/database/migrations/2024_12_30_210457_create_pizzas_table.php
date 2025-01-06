<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzasTable extends Migration
{
    public function up()
    {
        Schema::create('pizzas', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nome_pizza');
            $table->json('ingredientes');
            $table->decimal('preco_pizza', 8, 2); // Ex: 999,999.99
            $table->string('imagem_pizza')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pizzas');
    }
}
