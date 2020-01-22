<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        "semester",
    ];

    public function aperformances(){
        return $this->hasMany(Aperformance::class);
    }

    public function year(){
        return $this->belongsTo(Year::class);
    }

    public function semesteryear(){
        return $this->hasMany(SemesterYear::class);
    }

    public static function getSemesters(){
        $semesters = Semester::get();
        return $semesters;
    }
}
