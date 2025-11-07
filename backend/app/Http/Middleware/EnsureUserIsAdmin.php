<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Verifica se o utilizador está logado E se a role é 'admin'
        if (! $request->user() || $request->user()->role !== 'admin') {

            // 2. Se não for, bloqueia o acesso com um erro 403 (Forbidden)
            return response()->json(['message' => 'Acesso não autorizado.'], 403);
        }

        // 3. Se for admin, permite que a requisição continue
        return $next($request);
    }
}