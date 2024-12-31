<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaPromocoesTable extends Migration
{
    public function up()
    {
        Schema::create('pizza_promocoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('promocao_id');
            $table->unsignedBigInteger('pizza_id');
            $table->timestamps();
        
            // Definindo as chaves estrangeiras
            $table->foreign('promocao_id')->references('id')->on('promocoes')->onDelete('cascade');
            $table->foreign('pizza_id')->references('id')->on('pizzas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pizza_promocoes');
    }
}
