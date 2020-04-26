<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;

class CanManage
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
        if($request->user() && $request->user()->role == 'Concessionaire')
        {
            $campus = $request->route()->parameter('campus');
            $userCapmuses = $request->user()->userUserCampus;
            
            foreach($userCapmuses as $uc)
            {
                if($uc->campus_id == $campus->id) return $next($request);
            }
            return redirect(RouteServiceProvider::HOME);
        } 
        else if($request->user() &&  $request->user()->role == 'Admin') return $next($request);
        else return redirect(RouteServiceProvider::HOME); 
    }
}
