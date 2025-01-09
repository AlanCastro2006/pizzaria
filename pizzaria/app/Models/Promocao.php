<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocao extends Model
{
    use HasFactory;

    /**
     * A tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'promocoes';

    /**
     * Os atributos que podem ser preenchidos em massa.
     *
     * @var array
     */
    protected $fillable = [
        'value',       // Valor promocional
        'products',    // Produtos associados
        'days',        // Dias da semana
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'products' => 'array', // JSON convertido para array
        'days' => 'array',     // JSON convertido para array
    ];

    /**
     * Verifica se a promoção está ativa no dia atual.
     *
     * @return bool
     */
    public function isActiveToday(): bool
    {
        $today = now()->format('l'); // Nome do dia atual (Monday, Tuesday, etc.)
        return in_array($today, $this->days);
    }
}
