<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class RequestResult extends Model
{
    protected $fillable = [
      'user_id', 'university_id', 'faculty_id', 'department_id', 'student_id', 'request_status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function university(){
        return $this->belongsTo(University::class);
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public static function checkRequest($id){
        $status = RequestResult::where(['user_id' => Auth::user()->id, 'student_id' => $id])->first();
        if ($status){
            return true;
        }
        else{
            return false;
        }
    }

    public static function addRequest($id){
        $student = Student::getStudentById($id);
        $add_request = RequestResult::create([
           'user_id' => Auth::user()->id,
           'university_id' => $student->university_id,
           "department_id" => $student->department_id,
           'faculty_id'  => $student->faculty_id,
           'student_id' => $id,
        ]);

        return $add_request;
    }

    public static function getRequestsByFaculty($faculty_id){
        $requests = RequestResult::where(['university_id' => Auth::user()->university_id, "faculty_id" => $faculty_id])->get();
        return $requests;
    }

    public static function getRequestsByUniversity(){
        $requests = RequestResult::where('university_id' , Auth::user()->university_id)->get();
        return $requests;
    }

    public static function getRequestsById(){
        $requests = RequestResult::where('user_id' , Auth::user()->id)->get();
        return $requests;
    }

    public static function getRequestsByCompany(){
        $requests = RequestResult::where('user_id' , Auth::user()->id)->get();
        return $requests;
    }

    public static function acceptRequest($request_id){
        $status = RequestResult::where('id' , $request_id)->update([
            "request_status" => 1
        ]);
        return $status;
    }

    public static function rejectRequest($request_id){
        $status = RequestResult::where('id' , $request_id)->update([
            "request_status" => 0
        ]);
        return $status;
    }

    public static function getRequestById($id){
        $request = RequestResult::where('id', $id)->first();
        return $request;
    }
}
