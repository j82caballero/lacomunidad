<?php

namespace App\Http\Middleware;

use Closure;

class Perfil
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $perfil)
    {
        $user = auth()->user();

        if ( !$user->activo || $user->perfil == 'user' ) {

            auth()->logout();

            return redirect('login')->with('alert', 'No tiene permisos para acceder');
        }

        return $next($request);
    }
}
