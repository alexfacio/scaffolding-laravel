<?php

namespace App\Http\Middleware;

use Closure;
use Kodeine\Acl\Middleware\HasPermission as HasP;

class HasPermission extends HasP
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->request = $request;

        // override crud resources via config
        $this->crudConfigOverride();

        // if route has access
        if (( ! $this->getAction('is') or $this->hasRole()) and
            ( ! $this->getAction('can') or $this->hasPermission()) and
            ( ! $this->getAction('protect_alias') or $this->protectMethods())
        ) {
            return $next($request);
        }

        if ( $request->isJson() || $request->wantsJson() ) {
            return response()->json([
                'error' => [
                    'status_code' => 401,
                    'code'        => 'INSUFFICIENT_PERMISSIONS',
                    'description' => 'You are not authorized to access this resource.'
                ],
            ], 401);
        }

        return redirect()->intended(config('rules_route.base_sindi').'login');
        return abort(401, 'You are not authorized to access this resource.');
    }
}
