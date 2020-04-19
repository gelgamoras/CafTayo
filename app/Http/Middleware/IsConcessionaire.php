<?php

namespace App\Http\Middleware;

use Closure;

class IsConcessionaire
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
        if($request->user() && $request->user()->role != 'Concessionaire')
        {
            return redirect(RouteServiceProvider::HOME);
        }
        return $next($request);
    }
}
