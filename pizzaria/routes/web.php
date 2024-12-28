<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pizzaria_user.home.home');
});
