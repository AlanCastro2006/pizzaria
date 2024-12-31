<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Caso tenha outros seeders, eles podem ser adicionados aqui
        // Exemplo:
        // User::factory(10)->create();
        
        // Insere o administrador
        $this->call(AdminLoginSeeder::class);
    }
}
