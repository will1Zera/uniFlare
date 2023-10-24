<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

// Rota home que utiliza a função do controller
Route::get('/', [EventController::class, 'index']);

// Rota para criar eventos que utiliza a função do controller
Route::get('/events/create', [EventController::class, 'create']);
