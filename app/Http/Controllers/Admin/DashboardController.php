<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Student;
use App\University;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function Dashboard(){
        $students = Student::getstudents();
        $requests = \App\Request::getAllRequest();
        $companies = User::getCompanies();
        $universities = University::getAllUniversities();
        $students_percentage = (count($students)/ (count($students) + count($companies) + count($universities))) * 100;
        $companies_percentage = (count($companies)/ (count($students) + count($companies) + count($universities))) * 100;
        $universities_percentage = (count($universities)/ (count($students) + count($companies) + count($universities))) * 100;
        return view('Dashboard.Admin.dashboard', compact('requests', 'students', 'companies', 'universities', 'students_percentage', 'companies_percentage', 'universities_percentage'));
    }
}
