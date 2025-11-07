<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        api: __DIR__.'/../routes/api.php', 
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        
        // Ativa a autenticação de API (já fizemos)
        $middleware->statefulApi(); 

        // --- ADICIONE ISTO ---
        // Dá o apelido 'admin' ao nosso novo middleware
        $middleware->alias([
            'admin' => \App\Http\Middleware\EnsureUserIsAdmin::class,
        ]);
        // --- FIM DA ADIÇÃO ---

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();