<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'pedido_id',
        'pizza_id',
        'bebida_id',
        'quantidade',
        'preco_unitario'
    ];

    // Relacionamento com Pedido (1:N inverso)
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }

    // Relacionamento com Pizza (1:N inverso)
    public function pizza()
    {
        return $this->belongsTo(Pizza::class, 'pizza_id');
    }

    // Relacionamento com Bebida (1:N inverso)
    public function bebida()
    {
        return $this->belongsTo(Bebida::class, 'bebida_id');
    }
}
