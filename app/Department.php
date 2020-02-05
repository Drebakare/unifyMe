<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Department extends Model
{
    protected $fillable = [
        'university_id', 'faculty_id', 'department_name', "duration"
    ];

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }
    public function university(){
        return $this->belongsTo(University::class);
    }
    public function rperformances(){
        return $this->hasMany(Rperformance::class);
    }
    public function students(){
        return $this->hasMany(Student::class);
    }
    public function requestresults(){
        return $this->hasMany(RequestResult::class);
    }

    public static function getAllDepartments($university_id){
        $departments = Department::where("university_id", $university_id)->get();
        return $departments;
    }

    public static function getAllDepartmentsByFaculty($university_id, $faculty_id){
        $departments = Department::where(["university_id" => $university_id, "faculty_id" => $faculty_id])->get();
        return $departments;
    }

    public static function getDepartmentId($department_name){
        $department = Department::where('name', $department_name)->first();
        return $department->id;
    }

    public static function getDepartments(){
        $departments = Department::get();
        return $departments;
    }

    public static function addDepartment($request){

        $department = Department::where(['university_id' => Auth::user()->university_id, 'faculty_id' => $request->faculty_id, 'department_name' => strtoupper($request->department_name)])->first();
        if ($department){
            return true;
        }
        else{
            $create_department = Department::create([
                "university_id" => Auth::user()->university_id,
                "faculty_id" => $request->faculty_id,
                'department_name' =>  strtoupper($request->department_name),
                'duration' =>  $request->duration,
            ]);
            return true;
        }
    }
}
