<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

// Route::get("/user", [UserController::class, "index"]);
// Route::get("/user/{id}", [UserController::class, "show"]);
// Route::post("/user", [UserController::class, "store"]);
// Route::put("/user/{id}", [UserController::class, "update"]);
// Route::delete("/user/{id}", [UserController::class, "destroy"]);

Route::get('/', function () {
    return view('usuario.inicio');
});

Auth::routes();

Route::get('/inicio', [App\Http\Controllers\CadastroUsuarioController::class, 'show']);
Route::get('/cadastro-usuario', [App\Http\Controllers\CadastroUsuarioController::class, 'create']);
Route::post('/salvarcliente', [App\Http\Controllers\CadastroUsuarioController::class, 'store']);
Route::get('/usuarios-deletados/{id}', [App\Http\Controllers\CadastroUsuarioController::class, 'destroy']);
Route::get('/cadastro-usuario/{id}/edit', [App\Http\Controllers\CadastroUsuarioController::class, 'edit']);
Route::put('/cadastro-usuario/{id}/update', [App\Http\Controllers\CadastroUsuarioController::class, 'update']);
