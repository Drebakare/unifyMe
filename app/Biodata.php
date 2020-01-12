<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $fillable = [
      'student_id', 'nationality', 'state', 'town', 'dob' , 'phone_number', 'email_address'
    ];

    public function student(){
        return $this->belongsTo(User::class);
    }

    public static function getStudentBioData($student_id){
        $biodata = Biodata::where("student_id", $student_id)->first();

        return $biodata;
    }
}
