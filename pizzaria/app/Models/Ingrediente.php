<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_ingrediente',
        'preco_ingrediente'
    ];

    // Relacionamento com Pizzas (N:N)
    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'pizza_ingredientes', 'ingrediente_id', 'pizza_id');
    }
}
