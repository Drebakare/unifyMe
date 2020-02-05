<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $fillable = [
      'student_id', 'nationality', 'state', 'town', 'dob' , 'phone_number', 'email_address'
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public static function getStudentBioData($student_id){
        $biodata = Biodata::where("student_id", $student_id)->first();
        return $biodata;
    }

    public static function createStudentBiodata($request){
        $biodata = Biodata::create([
            "student_id" => $request->student_id,
            "nationality" => $request->nationality,
            "state" => $request->state,
            "dob" => $request->dob,
            "phone_number" => $request->phone_number,
            "email_address" => $request->email,
            "town" => $request->town
        ]);
        if ($biodata){
            return true;
        }
        else{
            return false;
        }
    }

    public static function updateStudentBiodata($request){
        $biodata = Biodata::where("student_id", $request->student_id)->update([
            "student_id" => $request->student_id,
            "nationality" => $request->nationality,
            "state" => $request->state,
            "dob" => $request->dob,
            "phone_number" => $request->phone_number,
            "email_address" => $request->email,
            "town" => $request->town
        ]);
        if ($biodata){
            return true;
        }
        else{
            return false;
        }
    }
}
