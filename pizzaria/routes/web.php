<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pizzaria_user.home.home');
});

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
