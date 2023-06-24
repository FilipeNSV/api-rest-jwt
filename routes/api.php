<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//* Rota para criação de um usuário
Route::post('/store', [UserController::class, 'store']);
//* Rota de login do usuário(retorna o token)
Route::post('/login', [AuthController::class, 'login']);

//* Rotas protegidas(token jwt)
Route::group(['middleware' => 'apiJwt'], function () {    

    //* Rota para visualzar todos os usuários da tabela
    Route::get('/index', [UserController::class, 'index']);
    //* Rota para visualizar um usuário específico, buscando pelo ID
    Route::get('/show/{id}', [UserController::class, 'show']);

});
