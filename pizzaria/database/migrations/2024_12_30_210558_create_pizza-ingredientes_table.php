<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaIngredientesTable extends Migration
{
    public function up()
    {
        Schema::create('pizza_ingredientes', function (Blueprint $table) {
            $table->foreignId('pizza_id')->constrained('pizzas')->onDelete('cascade');
            $table->foreignId('ingrediente_id')->constrained('ingredientes')->onDelete('cascade');
            $table->primary(['pizza_id', 'ingrediente_id']); // Chave composta
        });
    }

    public function down()
    {
        Schema::dropIfExists('pizza_ingredientes');
    }
}
