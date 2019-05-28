<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoleServidor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (auth()->user()->tipo == 'servidor' || auth()->user()->tipo == 'administrador') {
            return $next($request);
        }
        return redirect('index')->with('erro', 'Você não tem acesso a essa página'); 
    }
}
