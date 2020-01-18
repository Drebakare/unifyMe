<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class Aperformance extends Model
{
    protected $fillable = [
        'student_id', 'semester_id', 'total_point', 'total_unit', 'student_gp'
    ];

    public function students(){
        return $this->belongsTo(Student::class);
    }

    public function semesteryears(){
        return $this->belongsTo(SemesterYear::class);
    }

    public static function checkPerformance($matric_no, $semester_id){
        $student_id = Student::getStudentByMatricNo($matric_no);

        $status = Aperformance::where(["student_id" => $student_id, "semester_id" => $semester_id])->first();
        if ($status){
            return false;
        }
        else{
            return true;
        }
    }

    public static function addPerformace($request, $count){
        $check_status = Aperformance::checkPerformance($request->matric_no_.$count, $request->semester_yr_id);
        if ($check_status){
        }
        else{
            return false;
        }
    }
}
