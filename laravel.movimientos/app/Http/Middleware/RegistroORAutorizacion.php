<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RegistroORAutorizacion
{
    public function handle($request, Closure $next)
    {
        $nivel = Auth::user()->nivel;

        if (in_array($nivel, [14, 17])) {
            return $next($request);
        }

        abort(403, 'Acceso no autorizado.');
    }
}
