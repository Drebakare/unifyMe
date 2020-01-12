<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'semester_type', 'year'
    ];

    public function aperformances(){
        return $this->hasMany(Aperformance::class);
    }
}
