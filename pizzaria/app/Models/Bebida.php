<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bebida extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_bebida',
        'preco_bebida',
        'imagem_bebida'
    ];

    // Relacionamento com Itens do Pedido (1:N)
    public function itensPedido()
    {
        return $this->hasMany(PedidoItem::class, 'bebida_id');
    }
}
