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
Route::get('/adm/buttons', function () {
    return view('pizzaria_admin.buttons');
});

//----------------------------------------------//----------------------------------------------//----------------------------------------------
//----------------------------------------------ROTAS PROTEGIDAS POR AUTENTICAÇÃO---------------------------------------------------------------
//----------------------------------------------//----------------------------------------------//----------------------------------------------

//----------------------------------------------ROTAS DE ADMINISTRAÇÃO DE BEBIDAS---------------------------------------------------------------
Route::prefix('adm')->group(function () {
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
Route::prefix('adm')->group(function () {
    // Rota que exibe a lista das pizzas
    Route::get('/pizzas', [PizzasAdmController::class, 'index'])->name('pizzas_adm.index');
    // Rota para adicionar uma nova pizza
    Route::post('/pizzas/store', [PizzasAdmController::class, 'store'])->name('pizzas_adm.store');
    // Rota que atualiza uma pizza
    Route::put('/pizzas/update/{id}', [PizzasAdmController::class, 'update'])->name('pizzas_adm.update');
    // Rota que exclui uma pizza
    Route::delete('/pizzas/destroy/{id}', [PizzasAdmController::class, 'destroy'])->name('pizzas_adm.destroy');
});
