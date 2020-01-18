<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkStaff
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
        if((Auth::check()) && Auth::user()->user_type == 1){
            return $next($request);
        }
        else{
            return redirect(route('homepage'))->with('failure', 'you are not authorized to perform this task');
        }
    }
}
