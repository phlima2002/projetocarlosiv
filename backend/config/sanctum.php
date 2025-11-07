<?php

use Laravel\Sanctum\Sanctum;

return [

    /*
    |--------------------------------------------------------------------------
    | Domínios Stateful (Stateful Domains)
    |--------------------------------------------------------------------------
    |
    | Requisições de SPAs (como o seu Angular) que precisam de autenticação
    | baseada em cookies (sessão) devem vir de um dos domínios abaixo.
    |
    */

    'stateful' => [
        // --- ADICIONE SEU FRONTEND AQUI ---
        'http://localhost:4200',

        // (Valores padrão que podem já existir)
        'localhost',
        'localhost:3000',
        '127.0.0.1',
        '127.0.0.1:8000',
        '::1',
        env('SANCTUM_STATEFUL_DOMAINS'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Expiração do Token de API (Guard 'sanctum')
    |--------------------------------------------------------------------------
    |
    | Aqui você pode especificar o tempo (em minutos) que os tokens de API
    | criados (para apps móveis, por exemplo) devem ser válidos.
    | O padrão é 'null', o que significa que eles nunca expiram.
    |
    */

    'expiration' => null,

    /*
    |--------------------------------------------------------------------------
    | Middleware do Sanctum
    |--------------------------------------------------------------------------
    |
    | Ao autenticar com o guard 'sanctum', você pode opcionalmente
    | especificar middlewares customizados para adicionar à rota.
    |
    */

    'middleware' => [
        // --- CORREÇÃO AQUI ---
        // Apontando para os middlewares corretos do framework
        'verify_csrf_token' => \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
        'encrypt_cookies' => \Illuminate\Cookie\Middleware\EncryptCookies::class,
        // --- FIM DA CORREÇÃO ---
    ],

];

