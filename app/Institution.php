<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    protected $fillable = [
      "name"
    ];

    public static function getAllUniversities(){
        $universities = Institution::get();
        return $universities;
    }

    public static function getInstitutionName($institution_id){
        $institution_name = Institution::where('id', $institution_id)->first();
        return $institution_name;
    }
}
