<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

    public static function addYear($request){
        $check_year = Year::where(['year' => $request->year])->first();
        if ($check_year){
            return false;
        }
        else{
            $status = Year::create([
                "year" => $request->year,
            ]);
            if($status){
                return true;
            }
            else{
                return false;
            }
        }
    }
}
