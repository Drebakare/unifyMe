<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rperformance extends Model
{

    protected $fillable = [
        'student_id', 'user_id', 'request_status', 'university_id', 'faculty_id' , 'department_id'
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
}
