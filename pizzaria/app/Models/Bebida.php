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

}
