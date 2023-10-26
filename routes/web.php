<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

// Rota home que utiliza a função do controller
Route::get('/', [EventController::class, 'index']);

// Rota para formulário de criar eventos que utiliza a função do controller
Route::get('/events/create', [EventController::class, 'create']);

// Rota para exibir todas as informações de um evento em uma página única
Route::get('/events/{id}', [EventController::class, 'show']);

// Rota para criar eventos que utiliza a função do controller
Route::post('/events', [EventController::class, 'store']);
