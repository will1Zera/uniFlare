<?php

use Illuminate\Support\Facades\Route;

// Criação das rotas, que criam o caminho e retornam a view

Route::get('/', function () {
    return view('welcome');
});
