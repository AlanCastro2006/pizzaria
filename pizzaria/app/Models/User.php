<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Nome da tabela correspondente
    protected $table = 'usuarios';

    // Atributos preenchíveis
    protected $fillable = [
        'nome_usuario',
        'email_usuario',
        'senha_usuario',
        'tel_usuario',
        'end_usuario',
        'tipo_usuario',
        'pontos_usuario',
    ];

    // Atributos ocultos na serialização (proteção extra para segurança)
    protected $hidden = [
        'senha_usuario',
        'remember_token',
    ];

    // Nome do campo de senha personalizado
    protected $attributes = [
        'password' => 'senha_usuario',
    ];

    // Relacionamento com pedidos (1:N)
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'usuario_id');
    }

    // Função para definir como o Laravel deve obter e definir a senha
    public function getAuthPassword()
    {
        return $this->senha_usuario;
    }
}
