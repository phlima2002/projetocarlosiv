<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DenunciaRapidaController;
use App\Http\Controllers\Api\BoletimOcorrenciaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Nossas novas rotas para receber as denúncias
// O método "store" é, por convenção, usado para "salvar" um novo recurso.

Route::apiResource('denuncias-rapidas', DenunciaRapidaController::class)
     ->only(['index', 'store', 'destroy']);

Route::apiResource('boletins-ocorrencia', BoletimOcorrenciaController::class)
     ->only(['index', 'store', 'destroy']);