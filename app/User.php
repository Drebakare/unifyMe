<?php

namespace App;

use App\Mail\RegistrationMail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function university(){
        return $this->belongsTo(University::class);
    }
    public function rperformances(){
        return $this->hasMany(Rperformance::class);
    }

    public function requestresults(){
        return $this->hasMany(RequestResult::class);
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
            Mail::to($status->email)->send(new RegistrationMail($status));
            return true;
        }
        else{
            return false;
        }

    }

    public static function addNUCStaff($request){
        $check_user = User::where(['name' => $request->name, 'email' => $request->email_address, "user_type" => 3])->first();
        if ($check_user){
            return false;
        }
        else{
            $status = User::create([
                "name" => $request->name,
                "email" => $request->email_address,
                "password" => Hash::make($request->email_address),
                "phone_number" => $request->phone_number,
                "user_type" => 3,
                "token" => Str::Random(16),
            ]);
            if($status){
                Mail::to($status->email)->send(new RegistrationMail($status));
                return true;
            }
            else{
                return false;
            }
        }
    }

    public static function addCompany($request){
        $check_user = User::where(['name' => $request->name, 'email' => $request->email_address, "user_type" => 2])->first();
        if ($check_user){
            return false;
        }
        else{
            $create_company = Company::createCompany($request);
            $status = User::create([
                "name" => $request->name,
                "email" => $request->email_address,
                "password" => Hash::make($request->email_address),
                "phone_number" => $request->phone_number,
                "company_id" => $create_company->id,
                "user_type" => 2,
                "token" => Str::Random(16),
            ]);
            if($status){
                Mail::to($status->email)->send(new RegistrationMail($status));
                return true;
            }
            else{
                return false;
            }
        }


    }
    public static function updatePassword($request){
        $update_status = User::where('id', Auth::user()->id)->first();
        $status = false;
        if(Hash::check($request->previous_password, $update_status->password)){
            User::where('id', Auth::user()->id)->update([
                'password' => bcrypt($request->password),
            ]);
            $status = true ;
        }
        return $status;
    }

    public static function getCompanies(){
        $companies = User::where('user_type', 2)->get();
        return $companies;
    }

    public static function getNUCStaffs(){
        $staffs = User::where('user_type', 3)->get();
        return $staffs;
    }


}
