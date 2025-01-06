<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    // Definindo os campos que podem ser preenchidos
    protected $fillable = [
        'nome_pizza',
        'preco_pizza',
        'preco_promocional',
        'imagem_pizza',
        'ingredientes', // Se for necessário (com a alteração do tipo JSON)
    ];

    // Caso o campo 'ingredientes' seja armazenado como JSON
    protected $casts = [
        'ingredientes' => 'array',
    ];
}
