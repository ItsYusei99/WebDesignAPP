<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
public function handle(Request $request, Closure $next)
{
    // Si el usuario es de Administración (ID 1), lo dejamos pasar
    if (auth()->check() && auth()->user()->department_id == 1) {
        return $next($request);
    }

    // Si no, lo regresamos con un aviso
    return redirect('/dashboard')->with('error', 'Acceso denegado: Solo administradores.');
}
}
