<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PizzaPromocao extends Pivot
{
    use HasFactory;

    protected $table = 'pizza_promocoes';
}
