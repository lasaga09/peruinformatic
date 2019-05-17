<?php

namespace App\Http\Middleware;

use Closure;
use App\Usuario;

class ChequearRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        if (! $request->Usuario()->hasRole($role)) {
         return redirect('login.login');
    }
      return $next($request);
    }
}
