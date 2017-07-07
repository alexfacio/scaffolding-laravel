<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if (Auth::guard($guard)->check()) {
            //return redirect('/');
            $this->redirectPath();
        }

        return $next($request);
    }

    /**
     * Lógica de Redireccion cuando se loguea
     * @return [type] [description]
     */
    protected function redirectPath()
    {
        return url()->current();

        //
        if( auth()->user()->hasRole('super-admin|admin') ){
            return url('/'.config('rules_route.base_sindi'));
        }

        return url('/');
    }
}
