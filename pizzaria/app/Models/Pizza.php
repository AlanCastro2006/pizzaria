<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_pizza',
        'desc_pizza',
        'preco_pizza',
        'preco_promocional',
        'imagem_pizza'
    ];

    // Relacionamento com Ingredientes (N:N)
    public function ingredientes()
    {
        return $this->belongsToMany(Ingrediente::class, 'pizza_ingredientes', 'pizza_id', 'ingrediente_id');
    }

    // Relacionamento com Promoções (N:N)
    public function promocoes()
    {
        return $this->belongsToMany(Promocao::class, 'pizza_promocoes', 'pizza_id', 'promocao_id');
    }
}
