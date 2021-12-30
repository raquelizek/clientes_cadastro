<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Definindo a rota inicial.
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Definindo rotas do Sistema de Clientes.
Route::get('/inicio', [App\Http\Controllers\ClienteController::class, 'show']);
Route::get('/cadastro-usuario', [App\Http\Controllers\ClienteController::class, 'create']);
Route::post('/salvarcliente', [App\Http\Controllers\ClienteController::class, 'store']);
Route::get('/cadastro-usuario/{id}/edit', [App\Http\Controllers\ClienteController::class, 'edit']);
Route::put('/cadastro-usuario/{id}/update', [App\Http\Controllers\ClienteController::class, 'update']);
Route::delete('/usuarios-deletados/{id}', [App\Http\Controllers\ClienteController::class, 'destroy']);
