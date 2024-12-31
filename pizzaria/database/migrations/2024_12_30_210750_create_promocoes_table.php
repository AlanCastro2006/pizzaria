<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromocoesTable extends Migration
{
    public function up()
    {
        Schema::create('promocoes', function (Blueprint $table) {
            $table->id('promocao_id'); // Primary key
            $table->string('dias_promocao');
            $table->decimal('preco_promocao', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('promocoes');
    }
}
