<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DenunciaRapidaController;
use App\Http\Controllers\Api\BoletimOcorrenciaController;
use App\Http\Controllers\Api\AuthController;

// --- ROTAS PÚBLICAS ---
// (Registo e Login não precisam de autenticação)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


// --- ROTAS PROTEGIDAS (PRECISA ESTAR LOGADO) ---
// (Todas as outras rotas exigem 'auth:sanctum')
Route::middleware('auth:sanctum')->group(function () {
    
    // Rotas de Utilizador (Qualquer utilizador logado)
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/denuncias-rapidas', [DenunciaRapidaController::class, 'store']);
    Route::post('/boletins-ocorrencia', [BoletimOcorrenciaController::class, 'store']);

    
    // --- ROTAS DE ADMIN (SÓ ADMIN PODE ACEDER) ---
    // (Exigem 'auth:sanctum' E o nosso novo 'admin')
    Route::middleware('admin')->group(function () {
        
        Route::get('/denuncias-rapidas', [DenunciaRapidaController::class, 'index']);
        Route::delete('/denuncias-rapidas/{id}', [DenunciaRapidaController::class, 'destroy']);
        
        Route::get('/boletins-ocorrencia', [BoletimOcorrenciaController::class, 'index']);
        Route::delete('/boletins-ocorrencia/{id}', [BoletimOcorrenciaController::class, 'destroy']);
    });
});