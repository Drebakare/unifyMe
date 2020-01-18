<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SemesterYear extends Model
{
    protected $fillable = [
      "semester_id", "year_id"
    ];
    public function aperformances(){
        return $this->hasMany(Aperformance::class);
    }

    public function year(){
        return $this->hasMany(Year::class);
    }

    public function semesters(){
        return $this->hasMany(Semester::class);
    }

    public static function createSemesterYear($request){
        $semester = SemesterYear::where(['semester_id' => $request->semester_id, 'year_id' => $request->year_id])->first();
        if ($semester){
            return $semester->id;
        }
        else{
            $create_semester = SemesterYear::create([
                "semester_id" => $request->semester_id,
                'year_id' =>  $request->year_id,
            ]);
            return $create_semester->id;
        }
    }
}
