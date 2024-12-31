<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaIngredientesTable extends Migration
{
    public function up()
    {
        Schema::create('pizza_ingredientes', function (Blueprint $table) {
            $table->id(); // ID único para facilitar consultas
            $table->foreignId('pizza_id')
                  ->constrained('pizzas')
                  ->onDelete('cascade'); // Remove os ingredientes vinculados se a pizza for deletada
            $table->foreignId('ingrediente_id')
                  ->constrained('ingredientes')
                  ->onDelete('cascade'); // Remove o vínculo se o ingrediente for deletado
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pizza_ingredientes');
    }
}
