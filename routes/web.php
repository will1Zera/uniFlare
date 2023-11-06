<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

// Rota home que utiliza a função do controller
Route::get('/', [EventController::class, 'index']);

/* Rota para formulário de criar eventos que utiliza a função do controller
   Middleware: Utilizado para privar está rota de usuário deslogados */
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');

// Rota para exibir todas as informações de um evento em uma página única
Route::get('/events/{id}', [EventController::class, 'show']);

// Rota para criar eventos que utiliza a função do controller
Route::post('/events', [EventController::class, 'store']);

// Rota para exibir todos os eventos cadastrados do usuário
Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

// Rota deletar um evento
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth');

// Rota preencher com dados de um evento
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth');

// Rota atualiza um evento
Route::put('/events/update/{id}', [EventController::class, 'update'])->middleware('auth');

// Rota para participar de um evento
Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');

