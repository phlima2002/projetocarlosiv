<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Configurações de Cross-Origin Resource Sharing (CORS)
    |--------------------------------------------------------------------------
    |
    | Aqui você pode configurar o middleware de CORS (Cross-Origin Resource Sharing)
    | para sua aplicação Laravel.
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    /*
    |--------------------------------------------------------------------------
    | Origens Permitidas (Allowed Origins)
    |--------------------------------------------------------------------------
    |
    | Esta é a configuração mais importante.
    | Nós já adicionamos o endereço do seu app Angular.
    |
    */
    'allowed_origins' => [
        'http://localhost:4200',
        // Você pode adicionar seus domínios de produção aqui
        // ex: 'https://seu-dominio-frontend.com'
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
