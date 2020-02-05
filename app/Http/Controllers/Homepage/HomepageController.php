<?php

namespace App\Http\Controllers\Homepage;

use App\Company;
use App\Institution;
use App\Student;
use App\University;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function displayRequestForm(){
        $universities = University::getAllUniversities();
        return view('action.requestaccess', compact('universities'));
    }

    public function submitRequestForm(Request $request){
        $this->validate($request, [
            'full_name' => "bail|required",
            'staff_id' => "bail|required",
            'institution' => "bail|required",
            'phone_number' => "bail|required",
            'email_address' => "bail|required",
        ]);
        $confirm_request_uniqueness = \App\Request::checkUser($request->staff_id);
        if($confirm_request_uniqueness){
            return redirect()->back()->with('failure', 'application already exist');
        }
        else{
            $add_request = \App\Request::addRequest($request);
            if ($add_request){
                return redirect()->back()->with('success', 'application successfully submitted');
            }
            else{
                return redirect()->back()->with('failure', 'application could not be submitted');
            }
        }


    }

    public function Login(Request $request){
        $this->validate($request, [
            "email" => 'bail|required',
            "password" => 'bail|required'
        ]);
        $check_user = User::checkUser($request->email);
        if ($check_user){
            $status = Auth::attempt(["email" => $request->email, "password" => $request->password]);
            if ($status){
                $role = User::checkUserRole($request->email);
                if ($role == 0){
                    return redirect(route('admin.dashboard'));
                }
                else{
                    return redirect(route('user.dashboard'));
                }
            }
            else{
                return redirect()->back()->with('failure', "email or password not correct");
            }
        }
        else{
            return redirect()->back()->with('failure', "email does not exist, kindly register");
        }
    }

    public function Logout(){
        Auth::logout();
        return redirect(route('homepage'));
    }

    public function userDashboard(){
        if (Auth::user()->user_type == 1){
            $students = Student::getAllStudents(Auth::user()->university_id);
            $latest_students = Student::getLatest5students(Auth::user()->university_id);
            $staffs = User::getAllStaffs(Auth::user()->university_id);
            $latest_staffs = User::getLatest5staffs(Auth::user()->university_id);
        }
        else{
            $all_students = Student::getStudents();
            $all_universities = University::getAllUniversities();
            $companies = User::getCompanies();
        }
        return view('Dashboard.Others.dashboard', compact("students", "latest_students", "staffs", "latest_staffs", "all_students", "all_universities","companies"));
    }

    public function changePassword(){
        return view('Dashboard.Others.change-password');
    }

    public function updateChangePassword(Request $request){
        $validation = $this->validate($request, [
            'previous_password' => 'bail|required',
            'password' => 'bail|required|confirmed',
        ]);
        $change_password = User::updatePassword($request);
        if ($change_password){
            return redirect()->back()->with('success', "Password successfully changed");
        }
        else{
            return redirect()->back()->with('failure', "Password could not be changed");
        }
    }
}
