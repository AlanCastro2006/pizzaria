<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzasAdmController extends Controller
{
    /**
     * Exibe a view de gerenciamento de pizzas.
     */
    public function index()
    {
        return view('pizzaria_admin.pizzas_adm.pizzas');
    }
}
