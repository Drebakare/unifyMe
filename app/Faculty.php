<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Faculty extends Model
{
    protected $fillable = [
        'university_id', 'faculty_name'
    ];

    public function departments(){
        return $this->hasMany(Department::class);
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

    public static function getAllFaculties($university_id){
        $faculties = Faculty::where('university_id', $university_id)->get();
        return $faculties;
    }

    public static function getFaculties(){
        $faculties = Faculty::get();
        return $faculties;
    }

    public static function getFacultyId($faculty_name){
        $faculty = Faculty::where('name', $faculty_name)->first();
        return $faculty->id;
    }

    public static function addFaculty($request){
        $faculty = Faculty::where(['university_id' => Auth::user()->university_id, 'faculty_name' => strtoupper($request->faculty_name)])->first();
        if ($faculty){
            return true;
        }
        else{
            $create_faculty = Faculty::create([
                "university_id" => Auth::user()->university_id,
                'faculty_name' =>  strtoupper($request->faculty_name),
            ]);
            return true;
        }
    }
}
