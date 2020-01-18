<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type', 'university_id', 'company_id', 'is_verified', 'token',
        'phone_number', 'faculty_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function university(){
        return $this->belongsTo(University::class);
    }
    public function rperformances(){
        return $this->hasMany(Rperformance::class);
    }

    public static function checkUser($email){
        $check_status = User::where('email',$email)->first();
        if ($check_status){
            return true;
        }
        else{
            return false;
        }
    }

    public static function checkUserRole($email){
        $user = User::where("email", $email)->first();
        return $user->user_type;
    }

    public static function getAllStaffs($university_id){
        $staffs = User::where("university_id", $university_id)->get();
        return $staffs;
    }

    public static function getLatest5staffs($university_id){
        $staffs = User::where("university_id", $university_id)->get();
        if (count($staffs) > 5){
            $staffs = $staffs->take(5);
        }
        return $staffs;
    }

    public static function addStaff($request){
        $status = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->email),
            "phone_number" => $request->phone_number,
            "user_type" => 1,
            "university_id" => $request->university_id,
            "token" => Str::Random(16),
            "faculty" => $request->faculty_id,
        ]);
        if($status){
            return true;
        }
        else{
            return false;
        }

    }

}
