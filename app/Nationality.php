<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    protected $fillable = ["name"];

    public static function getAllNationalities(){
        $nations = Nationality::get();
        return $nations;
    }
}
