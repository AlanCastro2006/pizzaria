<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pizzaria_user.home.home');
});

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

use App\Http\Controllers\BebidasAdmController;
use App\Http\Controllers\PizzasAdmController;
use App\Http\Controllers\PromoAdmController;

Route::get('/adm/buttons', function () {
    return view('pizzaria_admin.buttons');
});

Route::get('/adm/bebidas', [BebidasAdmController::class, 'index'])->name('bebidas_adm.bebidas');
Route::get('/adm/pizzas', [PizzasAdmController::class, 'index'])->name('pizzas_adm.pizzas');
Route::get('/adm/promo', [PromoAdmController::class, 'index'])->name('promo_adm.promo');
