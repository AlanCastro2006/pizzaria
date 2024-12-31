<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nome_usuario',
        'email_usuario',
        'senha_usuario',
        'tel_usuario',
        'end_usuario',
        'tipo_usuario',
        'pontos_usuario'
    ];

    // Relacionamento com pedidos (1:N)
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'usuario_id');
    }
}
