<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaPromocoesTable extends Migration
{
    public function up()
    {
        Schema::create('pizza_promocoes', function (Blueprint $table) {
            $table->foreignId('pizza_id')->constrained('pizzas')->onDelete('cascade');
            $table->foreignId('promocao_id')->constrained('promocoes')->onDelete('cascade');
            $table->primary(['pizza_id', 'promocao_id']); // Chave composta
        });
    }

    public function down()
    {
        Schema::dropIfExists('pizza_promocoes');
    }
}
