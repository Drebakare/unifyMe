<?php

namespace App\Http\Middleware;

use App\Student;
use Closure;
use Illuminate\Support\Facades\Auth;

class checkStaffEligibility
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
        $id = $request->route()->parameters();
        $id = $id["id"];
        $student = Student::getStudentById($id);
        if((Auth::check()) && Auth::user()->user_type == 1 && Auth::user()->university_id == $student->university_id ){
            return $next($request);
        }
        else{
            return redirect(route('homepage'))->with('failure', 'you are not eligible to perform this operation');
        }
    }
}
