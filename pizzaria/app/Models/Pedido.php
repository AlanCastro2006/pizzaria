<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'data_pedido',
        'total_pedido',
        'status_pedido'
    ];

    // Relacionamento com User (1:N inverso)
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    // Relacionamento com Itens do Pedido (1:N)
    public function itens()
    {
        return $this->hasMany(PedidoItem::class, 'pedido_id');
    }
}
