<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBebidasTable extends Migration
{
    public function up()
    {
        Schema::create('bebidas', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('nome_bebida');
            $table->string('imagem_bebida')->nullable();
            $table->decimal('preco_bebida', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bebidas');
    }
}
