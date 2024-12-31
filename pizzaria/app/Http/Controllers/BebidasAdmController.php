<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BebidasAdmController extends Controller
{
    /**
     * Exibe a view de gerenciamento de bebidas.
     */
    public function index()
    {
        return view('pizzaria_admin.bebidas_adm.bebidas');
    }
}
