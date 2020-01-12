<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    protected $fillable = ["yeear"];

    public static function getYears(){
        $years = Year::get();
        return $years;
    }
}
