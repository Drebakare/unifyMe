<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'university_id', 'faculty_id', 'department_id', 'student_name', 'student_matric_no', 'year_of_admission',"status"
    ];

    public function aperformances(){
        return $this->hasMany(Aperformance::class);
    }
    public function biodata(){
        return $this->hasOne(Biodata::class);
    }
    public function university(){
        return $this->belongsTo(University::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }

    public static function getAllStudents($university_id){
        $students = Student::where('university_id', $university_id)->get();
        return $students;
    }

    public static function getLatest5students($university_id){
        $students = Student::where('university_id', $university_id)->orderBy('id', "desc")->get();
        if (count($students) >5){
            $students = $students->take(5);
        }

        return $students;
    }

    public static function checkStudent($student_matric_no){
        $student_status = Student::where('student_matric_no', $student_matric_no)->first();
        if ($student_status){
            return true;
        }
        else{
            return false;
        }
    }

    public static function addStudent($student){
        $student_status = Student::create([
            'university_id' => $student->university_id,
            'faculty_id' => $student->faculty_id,
            'department_id' => $student->department_id,
            'student_name' => $student->student_name,
            'student_matric_no' =>$student->matric_no,
            'year_of_admission' => $student->year_of_admission,
        ]);

        if ($student_status){
            return true;
        }
        else{
            return false;
        }
    }

    public static function updateStudentDetails($request, $id){
        $student_status = Student::where("id", $id)->update([
            'university_id' => $request->university_id,
            'faculty_id' => $request->faculty_id,
            'department_id' => $request->department_id,
            'student_name' => $request->student_name,
            'student_matric_no' =>$request->matric_no,
            'year_of_admission' => $request->year_of_admission,
        ]);
        if ($student_status){
            return true;
        }
        else{
            return false;
        }
    }
}
