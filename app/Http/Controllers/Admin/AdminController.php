<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Faculty;
use App\University;
use App\User;
use App\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function addUniversity(){
        $universities = University::getAllUniversities();

        return view('Dashboard.Admin.add-university', compact('universities'));
    }
    public function updateAddUniversity(Request $request){
        $university = University::addUniversity($request);
        if ($university){
            return redirect()->back()->with("success", "University successfully added");
        }
        else{
            return redirect()->back()->with("failure", "University could not be successfully added");
        }
    }

    public function addNUCStaffs(){
        $staffs = User::getNUCStaffs();
        return view('Dashboard.Admin.add-nuc-staff',compact('staffs'));
    }

    public function addCompany(){
        $companies = User::getCompanies();
        return view('Dashboard.Admin.add-company',compact('companies'));
    }

    public function addYear(){
        $years = Year::getYears();
        return view('Dashboard.Admin.add-year',compact('years'));
    }

    public function submitAddNUCStaffForm(Request $request){
        $status = User::addNUCStaff($request);
        if ($status){
            return redirect()->back()->with("success", "Nuc staff successfully added");
        }
        else{
            return redirect()->back()->with("failure", "Nuc Staff could not be successfully added");
        }
    }

    public function submitAddCompanyForm(Request $request){
        $status = User::addCompany($request);
        if ($status){
            return redirect()->back()->with("success", "Academic Year successfully added");
        }
        else{
            return redirect()->back()->with("failure", "Academic Year could not be added");
        }
    }

    public function submitAddYearForm(Request $request){
        $status = Year::addYear($request);
        if ($status){
            return redirect()->back()->with("success", "Company successfully added");
        }
        else{
            return redirect()->back()->with("failure", "Company could not be successfully added");
        }
    }

    public function viewRequest(){
        $requests = \App\Request::getAllRequest();
        return view('Dashboard.Admin.view-request',compact('requests'));
    }
}
