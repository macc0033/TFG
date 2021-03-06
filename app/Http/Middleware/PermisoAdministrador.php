<?php

namespace App\Http\Middleware;

use Closure;

class PermisoAdministrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->permiso())
            return $next($request);
        return redirect('/inicio')->with('mensaje-error', 'No tienes permiso para entrar aquí');
    }

    private function permiso()
    {
        return session()->get('rol_id') == 1;
    }
}
