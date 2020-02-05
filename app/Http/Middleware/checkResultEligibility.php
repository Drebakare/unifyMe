<?php

namespace App\Http\Middleware;

use App\RequestResult;
use App\Student;
use Closure;
use Illuminate\Support\Facades\Auth;

class checkResultEligibility
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
        if(Auth::check()){
            $id = $request->route()->parameters();
            $id = $id["request_id"];
            $get_request = RequestResult::getRequestById($id);
            if (Auth::user()->company_id != null && $get_request->user_id == Auth::user()->id){
                return $next($request);
            }
            if (Auth::user()->company_id == null && $get_request->user_id == Auth::user()->id){
                return $next($request);
            }
            return redirect()->back()->with('failure', 'you are not eligible to perform this operation');
        }
        else{
        return redirect(route('homepage'))->with('failure', 'you are not eligible to perform this operation');
    }
    }
}
