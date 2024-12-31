<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromoAdmController extends Controller
{
    /**
     * Exibe a view de gerenciamento de promoções.
     */
    public function index()
    {
        return view('pizzaria_admin.promo_adm.promo');
    }
}
