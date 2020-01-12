<?php

namespace App\Http\Controllers\Staff;

use App\Biodata;
use App\Department;
use App\Faculty;
use App\Student;
use App\University;
use App\User;
use App\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Excel;

class StaffController extends Controller
{
    public function addStudent(){
        $faculties = Faculty::getAllFaculties(Auth::user()->university_id);
        $departments = Department::getAllDepartments(Auth::user()->university->id, null);
        $years = Year::getYears();
        return view('Dashboard.Others.Staff.add-student', compact("years","faculties", "departments"));
    }

    public function addStaff(){
        return view('Dashboard.Others.Staff.add-staff');
    }

    public function submitAddStudentForm(Request $request){
        $this->validate($request, [
            'student_name' => "bail|required",
            'matric_no' => "bail|required",
            'university_id' => "bail|required",
            'faculty_id' => "bail|required",
            'department_id' => "bail|required",
            'year_of_admission' => "bail|required"
        ]);
        $check_student = Student::checkStudent($request->matric_no);
        if ($check_student){
            return redirect()->back()->with('failure', "student already added");
        }
        else{
            $student_status = Student::addStudent($request);
            if ($student_status){
                return redirect()->back()->with('success', "student added successfully");
            }
            else{
                return redirect()->back()->with('failure', "student could not be added");
            }
        }

    }

    public function submitAddStaffForm(Request $request){
        $this->validate($request, [
            'name' => "bail|required",
            'phone_number' => "bail|required",
            'university_id' => "bail|required",
            'email' => "bail|required",
        ]);
        $check_staff = User::checkUser($request->email);
        if ($check_staff){
            return redirect()->back()->with('failure', "staff already added");
        }
        else{
            $staff_status = User::addStaff($request);
            if ($staff_status){
                return redirect()->back()->with('success', "staff added successfully");
            }
            else{
                return redirect()->back()->with('failure', "staff could not be added");
            }
        }

    }

    public function submitAddMultipleStudents(Request $request){
        $this->validate($request, [
            "student_list" =>"required|mimes:xls,xlsx"
        ]);
        $path = $request->file('student_list')->getRealPath();
        $data = Excel::load($path)->get();
        if ($data->count()> 0 ){
            foreach ($data -> toArray() as $key => $value){
                foreach ($value as $row){
                     $insert_data [] = array(
                        "university_id" => University::getInstitutionId($row["university_name"]),
                        "faculty_id" => Faculty::getFacultyId($row["faculty_name"]),
                        "department_id" => Department::getDepartmentId($row["department_name"]),
                        "student_name" => $row["student_name"],
                        "student_matric_no" => $row["student_matric_no"],
                     );
                }
            }
            if (!empty($insert_data)){
                $student_status = Student::insert($insert_data);
                if ($student_status){
                    return redirect()->back()->with('success', "students added successfully");
                }
                else{
                    return redirect()->back()->with('failure', "students could not be added");
                }
            }
        }
    }

    public function updateBioData(){
        $students = Student::getAllStudents(Auth::user()->university_id);
        $faculties = Faculty::getAllFaculties(Auth::user()->university_id);
        $departments = Department::getAllDepartments(Auth::user()->university->id, null);
        $years = Year::getYears();
        return view('Dashboard.Others.Staff.students-list', compact("faculties", "departments", "years", "students"));
    }

    public function updateStudentDetails(Request $request, $id){
        $student_update = Student::updateStudentDetails($request, $id);
        if ($student_update){
            return redirect()->back()->with('success', "student's info updated successfully");
        }
        else{
            return redirect()->back()->with('failure', "student's info cannot be updated");
        }
    }

    public function updateStudentBiodata($id){
        $biodata = Biodata::getStudentBioData($id);
        return view("Dashboard.Others.Staff.add-student-biodata", compact("biodata"));
    }
}