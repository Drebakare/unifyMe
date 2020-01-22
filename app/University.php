<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = [
        'name', 'location'
    ];

    public function user(){
        return $this->hasMany(User::class);
    }
    public function departments(){
        return $this->hasMany(Department::class);
    }
    public function faculties(){
        return $this->hasMany(Faculty::class);
    }
    public function rperformances(){
        return $this->hasMany(Rperformance::class);
    }
    public function students(){
        return $this->hasMany(Student::class);
    }
    public function requestresults(){
        return $this->hasMany(RequestResult::class);
    }

    public static function getAllUniversities(){
        $universities = University::get();
        return $universities;
    }

    public static function getInstitutionName($institution_id){
        $institution_name = University::where('id', $institution_id)->first();
        return $institution_name;
    }
    public static function getInstitutionId($institution_name){
        $institution = University::where('name', $institution_name)->first();
        return $institution->id;
    }


}
