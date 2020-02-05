<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    protected $fillable = [
        'address', 'area_of_specialization'
    ];

    public function user(){
        return $this->hasMany(User::class);
    }

    public static function createCompany($request){
        $create_company = Company::create([
            'address' => $request->address,
            'area_of_specialization' => $request->area_of_spec
        ]);
        return $create_company;
    }
}
