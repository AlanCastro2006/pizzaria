<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminLoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            'nome_usuario' => 'Administrador',
            'email_usuario' => 'admin@gmail.com',
            'senha_usuario' => Hash::make('adm123'), // Criptografa a senha
            'tel_usuario' => '00000000000', // Opcional, ajuste conforme necessário
            'end_usuario' => 'Endereço do Administrador', // Opcional
            'tipo_usuario' => 'admin', // Certifique-se de que o campo suporta esse valor
            'pontos_usuario' => 0, // Inicialmente, sem pontos
        ]);
    }
}
