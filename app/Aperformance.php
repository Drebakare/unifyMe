<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Aperformance extends Model
{
    protected $fillable = [
        'student_id',  'total_point', 'total_unit', 'student_gp','semester_year_id'
    ];

    public function students(){
        return $this->belongsTo(Student::class);
    }

    public function semesteryears(){
        return $this->belongsTo(SemesterYear::class,'semester_year_id');
    }

    public static function checkPerformance($matric_no, $semester_id){
        $student_id = Student::getStudentByMatricNo($matric_no);
        $status = Aperformance::where(["student_id" => $student_id->id, "semester_year_id" => $semester_id])->first();
        if ($status){
            return true;
        }
        else{
            return false;
        }
    }

    public static function getPerformance($student_id, $semester_year_id){
        $academic_performance = Aperformance::where(["student_id" => $student_id, "semester_year_id" => $semester_year_id])->first();
        return $academic_performance ;
    }

    public static function addPerformace($request, $count){
        $matric_no = 'matric_no_'.$count;
        $total_point = 'total_point_'.$count;
        $total_unit = 'total_unit_'.$count;
        $student = Student::getStudentByMatricNo($request->$matric_no);
        $grade_point = GradePoint::getGradePointByUniversityId($student->university_id);
        $school_grade_point = $grade_point;
        $add_academic_performance = Aperformance::create([
            "student_id" => $student->id,
            "semester_year_id" => $request->semester_yr_id,
            "total_point" => $request->$total_point,
            "total_unit" =>$request->$total_unit,
            "student_gp" => round(($request->$total_unit/$request->$total_point)* $school_grade_point, 2),
        ]);
    }

    public static function updatePerformace($request, $count){
        $matric_no = 'matric_no_'.$count;
        $total_point = 'total_point_'.$count;
        $total_unit = 'total_unit_'.$count;
        $student = Student::getStudentByMatricNo($request->$matric_no);
        $grade_point = GradePoint::getGradePointByUniversityId($student->university_id);
        $school_grade_point = $grade_point;
        $add_academic_performance = Aperformance::where(["student_id" => $student->id, "semester_year_id" =>$request->semester_yr_id])->update([
            "student_id" => $student->id,
            "semester_year_id" => $request->semester_yr_id,
            "total_point" => $request->$total_point,
            "total_unit" =>$request->$total_unit,
            "student_gp" => round(($request->$total_unit/$request->$total_point)* $school_grade_point, 2),
        ]);
    }

    public static function studentsPerformance($student_id){
        $results = Aperformance::where('student_id', $student_id)->get();
        return $results;
    }
}
