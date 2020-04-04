<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class HasAdmin
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
        if(User::where("role", "=", "Admin")->count() > 0)
            return redirect()->route('login');
        else 
            return $next($request);
    }
}
