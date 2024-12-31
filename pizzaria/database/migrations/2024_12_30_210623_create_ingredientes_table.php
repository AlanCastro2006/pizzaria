<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientesTable extends Migration
{
    public function up()
    {
        Schema::create('ingredientes', function (Blueprint $table) {
            $table->id('ingrediente_id'); // Primary key
            $table->string('nome_ingrediente');
            $table->decimal('preco_ingrediente', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ingredientes');
    }
}
