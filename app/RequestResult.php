<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestResult extends Model
{
    protected $fillable = [
      'user_id', 'university_id', 'faculty_id', 'department_id', 'student_id', 'request_status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function university(){
        return $this->belongsTo(University::class);
    }

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }


}
