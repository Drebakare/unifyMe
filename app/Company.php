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
}
