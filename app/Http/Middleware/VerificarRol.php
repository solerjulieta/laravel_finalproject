<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;


class VerificarRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $usuario = Auth::user();
        if($usuario->rol_id !== 1){
            return redirect()->route('inicio');
        } 
        return $next($request);
    }
}
