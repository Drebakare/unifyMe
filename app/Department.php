<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public static function getAllDepartments($university_id, $faculty_id){
        $departments = Department::where("university_id", $university_id)->get();
        return $departments;
    }

    public static function getDepartmentId($department_name){
        $department = Department::where('name', $department_name)->first();
        return $department->id;
    }
}
