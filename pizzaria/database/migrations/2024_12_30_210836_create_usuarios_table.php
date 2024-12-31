<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('usuario_id'); // Primary key
            $table->string('nome_usuario');
            $table->string('email_usuario')->unique();
            $table->string('senha_usuario');
            $table->string('end_usuario');
            $table->string('tel_usuario');
            $table->enum('tipo_usuario', ['comum', 'administrador'])->default('comum');
            $table->integer('pontos_usuario')->default(0); // Pontos de fidelidade
            $table->timestamps(); // created_at e updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
