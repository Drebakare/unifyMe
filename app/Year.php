<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = ["year"];

    public static function getYears(){
        $years = Year::get();
        return $years;
    }

    public function semesteryear(){
        return $this->hasMany(SemesterYear::class);
    }
}
