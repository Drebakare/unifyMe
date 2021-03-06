<?php

namespace App\Http\Controllers\Staff;

use App\Aperformance;
use App\Biodata;
use App\Department;
use App\Faculty;
use App\GradePoint;
use App\Nationality;
use App\RequestResult;
use App\Semester;
use App\SemesterYear;
use App\State;
use App\Student;
use App\University;
use App\User;
use App\Year;
use DemeterChain\A;
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
        $faculties = Faculty::getAllFaculties(Auth::user()->university_id);
        return view('Dashboard.Others.Staff.add-staff', compact("faculties"));
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
            "faculty_id" => 'bail|required'
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

    public function NucupdateBioData(){
        $students = Student::getStudents();
        $faculties = Faculty::getFaculties();
        $departments = Department::getDepartments();
        $years = Year::getYears();
        return view('Dashboard.Others.Staff.nuc-students-list', compact("faculties", "departments", "years", "students"));
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
        $states = State::getAllStates();
        $nations = Nationality::getAllNationalities();
        return view("Dashboard.Others.Staff.add-student-biodata", compact("biodata","states", "nations", "id"));
    }

    public function submitAddStudentBiodata(Request $request){
        $biodata = Biodata::createStudentBiodata($request);
        if ($biodata){
            return redirect()->back()->with('success', "student's biodata succesfully added");
        }
        else{
            return redirect()->back()->with('failure', "student's biodata could not be added");

        }
    }

    public function submitUpdateStudentBiodata(Request $request){
        $biodata = Biodata::updateStudentBiodata($request);
        if ($biodata){
            return redirect()->back()->with('success', "student's biodata succesfully updated");
        }
        else{
            return redirect()->back()->with('failure', "student's biodata could not be updated");

        }
    }

    public function uploadStudentResult(){
        $years = Year::getYears();
        $semesters = Semester::getSemesters();
        /*$faculties = Faculty::getAllFaculties(Auth::user()->university_id);*/
        return view("Dashboard.Others.Staff.upload-student-result", compact('years', 'semesters', "students"));
    }

    public function selectSemester(Request $request){
        $semester  = SemesterYear::createSemesterYear($request);
        $a_performance = [];
        if (Auth::user()->faculty_id != null){
            $students =  Student::getSpecificStudents(Auth::user()->university_id,Auth::user()->faculty_id);

            foreach($students as $key => $student){
                $academic_performance = Aperformance::getPerformance($student->id, $semester);
                if ($academic_performance != null){
                    $a_performance[$key] = $academic_performance;
                }
            }
        }
        else{
            $students = Student::getAllStudents(Auth::user()->university_id);
            foreach($students as $key => $student){
                $academic_performance = Aperformance::getPerformance($student->id, $semester);
                if ($academic_performance != null){
                    $a_performance[$key] = $academic_performance;
                }
            }
        }
        return view("Dashboard.Others.Staff.upload-result", compact('students', 'semester', 'a_performance'));
    }

    public function processResult(Request $request){
        $status = false;
        for($i = 0; $i < $request->maximum_number; $i++){
            $matric_no = 'matric_no_'.$i;
            $check_status = Aperformance::checkPerformance($request->$matric_no, $request->semester_yr_id);
            if ($check_status){
                $status = false;
                break;
            }
            else{
                Aperformance::addPerformace($request, $i);
                $status = true;
            }
        }
        if ($status){
            return redirect(route('staff.upload-student-result'))->with('success', 'result uploaded successfully');
        }
        else{
            return redirect(route('staff.upload-student-result'))->with("failure", "Result already uploaded");
        }

    }
    public function processUpdateResult(Request $request){
        $status = false;
        for($i = 0; $i < $request->maximum_number; $i++){
            Aperformance::updatePerformace($request, $i);
            $status = true;
        }
        if ($status){
            return redirect(route('staff.upload-student-result'))->with('success', 'result updated successfully');
        }
        else{
            return redirect(route('staff.upload-student-result'))->with("failure", "Result could not be updated");
        }
    }

    public function viewResult(){
        if (Auth::user()->faculty_id != null) {
            $students =  Student::getSpecificStudents(Auth::user()->university_id,Auth::user()->faculty_id);
        }
        else{
            $students = Student::getAllStudents(Auth::user()->university_id);
        }
        return view('Dashboard.Others.Staff.view-result', compact('students'));
    }

    public function viewNUCResult(){
        $students =  Student::getStudents();
        return view('Dashboard.Others.Staff.nuc-view-result', compact('students'));
    }

    public function viewStudentResult($id){
        $student = Student::getStudentById($id);
        $results = Aperformance::studentsPerformance($id);
        $grade_point = GradePoint::getGradePointByUniversityId($student->university_id);
        $school_grade_point = $grade_point;
        return view('Dashboard.Others.Staff.view-student-result', compact('results', 'school_grade_point', 'student'));
    }

    public function requestResult(){
        $universities = University::getAllUniversities();
        $faculties = Faculty::getFaculties();
        $departments = Department::getDepartments();
        return view('Dashboard.Others.Staff.select-result-request-section', compact('universities', 'faculties', 'departments'));
    }

    public function getRequestStudents(Request $request){
        $students = Student::getRequestStudents($request);
        if (count($students) > 0){
            return view('Dashboard.Others.Staff.view-request-student-list', compact('students'));
        }
        else{

            return redirect()->back()->with("failure", "No student in the options selected");
        }
    }

    public function finalRequestAccess($id){
        $status = RequestResult::checkRequest($id);
        if ($status){
            return redirect(route('user.request-result'))->with("failure", "Request Already Sent");
        }
        else{
            $add_request = RequestResult::addRequest($id);
            if ($add_request){
                return redirect(route('user.request-result'))->with("success", "Request successfully submitted");
            }
            else{
                return redirect(route('user.request-result'))->with("failure", "Request could not be submitted");
            }
        }
    }

    public function viewRequest(){
        $requests= null;
        if (Auth::user()->faculty_id != null){
            $requests = RequestResult::getRequestsByFaculty(Auth::user()->faculty_id);
        }
        else{
            $requests = RequestResult::getRequestsByUniversity();
        }
        return view('Dashboard.Others.Staff.requests-list', compact('requests'));
    }

    public function acceptRequest(Request $request){
        $request_parameters = $request->route()->parameters();
        $request_id = $request_parameters["request_id"];
        $status = RequestResult::acceptRequest($request_id);
        if ($status){
            return redirect()->back()->with("success", "Request successfully accepted");
        }
        else{
            return redirect()->back()->with("failure", "request could not be accepted");
        }
    }

    public function rejectRequest(Request $request){
        $request_parameters = $request->route()->parameters();
        $request_id = $request_parameters["request_id"];
        $status = RequestResult::rejectRequest($request_id);
        if ($status){
            return redirect()->back()->with("success", "Request successfully rejected");
        }
        else{
            return redirect()->back()->with("failure", "request could not be rejected");
        }
    }

    public function viewRequestStatus(){
        $requests= null;
        $requests = RequestResult::getRequestsById();
        return view('Dashboard.Others.Staff.view-requests-status', compact('requests'));
    }

    public function externalViewResult($request_id){
        $request = RequestResult::getRequestById($request_id);
        $student = Student::getStudentById($request->student_id);
        $results = Aperformance::studentsPerformance($request->student_id);
        $grade_point = GradePoint::getGradePointByUniversityId($student->university_id);
        $school_grade_point = ceil($grade_point);
        return view('Dashboard.Others.Staff.view-student-result', compact('results', 'school_grade_point', 'student'));


    }

    public function systemSettings(){
        $grade_point = GradePoint::getGradePoint();
        return view('Dashboard.Others.Staff.system-settings', compact('grade_point'));
    }

    public function updateSystemSettings(Request $request){
        $grade_point = GradePoint::updateGradePoint($request->grade_point);
        if ($grade_point){
            return redirect()->back()->with("success", "Grade point successfully updated");
        }
        else{
            return redirect()->back()->with("failure", "Grade point could not be update");
        }
    }

    public function addFaculty(){
        $faculties = Faculty::getAllFaculties(Auth::user()->university_id);
        return view('Dashboard.Others.Staff.add-faculty', compact('faculties'));
    }

    public function addDepartment(){
        $faculties = Faculty::getAllFaculties(Auth::user()->university_id);
        if (Auth::user()->faculty !=null){
            $departments = Department::getAllDepartmentsByFaculty(Auth::user()->university_id, Auth::user()->faculty_id);
        }
        if (Auth::user()->faculty ==null){
            $departments = Department::getAllDepartments(Auth::user()->university_id);
        }
        return view('Dashboard.Others.Staff.add-department', compact('departments', 'faculties'));
    }

    public function updateAddFaculty(Request $request){
        $faculty = Faculty::addFaculty($request);
        if ($faculty){
            return redirect()->back()->with("success", "Faculty successfully added");
        }
        else{
            return redirect()->back()->with("failure", "Faculty could not be successfully added");
        }
    }

    public function updateAddDepartment(Request $request){
        $department = Department::addDepartment($request);
        if ($department){
            return redirect()->back()->with("success", "Department successfully added");
        }
        else{
            return redirect()->back()->with("failure", "Department could not be successfully added");
        }
    }
}
