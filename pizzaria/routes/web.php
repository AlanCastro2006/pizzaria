<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BebidasAdmController;
use App\Http\Controllers\PizzasAdmController;
use App\Http\Controllers\PromoAdmController;

//Rota da tela Inicial (Home)
Route::get('/', function () {
    return view('pizzaria_user.home.home');
});

//Rota que retorna a tela de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
//Rota que faz o login
Route::post('/login', [AuthController::class, 'login']);
//Rota que retorna os botões do modo admin
Route::get('/admin/buttons', function () {
    return view('pizzaria_admin.buttons');
});

//----------------------------------------------//----------------------------------------------//----------------------------------------------
//----------------------------------------------ROTAS PROTEGIDAS POR AUTENTICAÇÃO---------------------------------------------------------------
//----------------------------------------------//----------------------------------------------//----------------------------------------------

//----------------------------------------------ROTAS DE ADMINISTRAÇÃO DE BEBIDAS---------------------------------------------------------------
Route::prefix('admin')->group(function () {
    //Rota que exibe a lista as bebidas
    Route::get('/bebidas', [BebidasAdmController::class, 'index'])->name('bebidas_adm.index');
    //Rota para adicionar uma nova bebida
    Route::post('/bebidas/store', [BebidasAdmController::class, 'store'])->name('bebidas_adm.store');
    //Rota que atualiza uma bebida
    Route::put('/bebidas/update/{id}', [BebidasAdmController::class, 'update'])->name('bebidas_adm.update');
    //Rota que exclui uma bebida
    Route::delete('/bebidas/destroy/{id}', [BebidasAdmController::class, 'destroy'])->name('bebidas_adm.destroy');
});

//----------------------------------------------ROTAS DE ADMINISTRAÇÃO DE PIZZAS---------------------------------------------------------------
Route::prefix('admin')->group(function () {
    // Rota que exibe a lista das pizzas
    Route::get('/pizzas', [PizzasAdmController::class, 'index'])->name('pizzas.index');
    // Rota para adicionar uma nova pizza
    Route::post('/pizzas/store', [PizzasAdmController::class, 'store'])->name('pizzas_adm.store');
    // Rota que atualiza uma pizza
    Route::put('/pizzas/update/{id}', [PizzasAdmController::class, 'update'])->name('pizzas_adm.update');
    // Rota que exclui uma pizza
    Route::delete('/pizzas/destroy/{id}', [PizzasAdmController::class, 'destroy'])->name('pizzas_adm.destroy');
});


// ----------------------------------------------ROTAS DE ADMINISTRAÇÃO DE PROMOÇÕES---------------------------------------------------------------
Route::prefix('admin')->group(function () {
    // Rota que exibe a lista das promoções
    Route::get('/promocoes', [PromoAdmController::class, 'index'])->name('promo_adm.index');
    // Rota para adicionar uma nova promoção
    Route::post('/promocoes/store', [PromoAdmController::class, 'store'])->name('promo_adm.store');
    // Rota que atualiza uma promoção
    Route::put('/promocoes/update/{id}', [PromoAdmController::class, 'update'])->name('promo_adm.update');
    // Rota que exclui uma promoção
    Route::delete('/promocoes/destroy/{id}', [PromoAdmController::class, 'destroy'])->name('promo_adm.destroy');
    // Rota que leva para a página de criação da promoção
    Route::get('/promocoes/create', [PromoAdmController::class, 'create'])->name('promocoes.create');
    // Rota que leva para a página de edição da promoção
    Route::get('/promocoes/edit/{id}', [PromoAdmController::class, 'edit'])->name('promo_adm.edit');
});
