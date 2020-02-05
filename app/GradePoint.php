<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class GradePoint extends Model
{
    protected $fillable = [
      'grade_point', 'university_id'
    ];

    public function university(){
        return $this->belongsTo(University::class);
    }

    public static function getGradePoint(){
        $gradepoint = GradePoint::where('university_id', Auth::user()->university_id)->first();
        if ($gradepoint){
            return $gradepoint;
        }
        else{
            $gradepoint = GradePoint::create([
                'university_id' => Auth::user()->university_id
            ]);
            return $gradepoint;
        }
    }

    public static function updateGradePoint($grade_point){
        $grade_point = GradePoint::where('university_id', Auth::user()->university_id)->update([
            'grade_point' => $grade_point,
        ]);
        if ($grade_point){
            return true;
        }
        else{
            return false;
        }
    }

    public static function getGradePointByUniversityId($university_id){
        $gradepoint = GradePoint::where('university_id', $university_id)->first();
        if ($gradepoint){
            return $gradepoint->grade_point;
        }
        else{
            $gradepoint = GradePoint::create([
                'university_id' => $university_id
            ]);
            return $gradepoint->grade_point;
        }
    }
}
