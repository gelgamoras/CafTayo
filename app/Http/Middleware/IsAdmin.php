<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;

class IsAdmin
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
        if($request->user() && $request->user()->role != 'Admin')
        {
            return redirect(RouteServiceProvider::HOME);
        }
        return $next($request);
    }
}
