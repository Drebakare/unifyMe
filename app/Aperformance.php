<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
