<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocao extends Model
{
    use HasFactory;

    protected $fillable = [
        'dias_promocao',
        'preco_promocao'
    ];

    // Relacionamento com Pizzas (N:N)
    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'pizza_promocoes', 'promocao_id', 'pizza_id');
    }
}
