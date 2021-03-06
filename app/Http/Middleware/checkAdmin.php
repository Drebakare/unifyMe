<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkAdmin
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
        if((Auth::check())&& (Auth::user()->user_type == 0)){
            return $next($request);
        }
        else{
            return redirect(route('homepage'))->with('failure', 'Action is strictly for the admin');
        }
    }
}
