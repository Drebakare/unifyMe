<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class  Request extends Model
{
    protected $fillable = [
        'staff_id', 'institution_name', 'name', 'phone_number', 'email_address'
    ];

    public static function checkUser($staff_id){
        $get_user = Request::where("staff_id", $staff_id)->first();
        if($get_user){
            return true;
        }
        else{
            return false;
        }
    }

    public static function addRequest($request){
        $institution_name = University::getInstitutionName($request->institution);
        $add_request = Request::create([
           "staff_id" => $request->staff_id,
           "institution_name" => $institution_name->name,
           "name" => $request->full_name,
            "phone_number" => $request->phone_number,
            "email_address" => $request->email_address
        ]);
        if ($add_request){
            return true;
        }
        else{
            return false;
        }
    }
    public static function getAllRequest(){
        $requests = Request::where('status', 0)->get();
        return $requests;
    }

    public static function getRequest($staff_id){
        $request = Request::where('staff_id', $staff_id)->first();
        return $request;
    }
    public static function updateRequestStatus($staff_id){
        $request = Request::where('staff_id', $staff_id)->update([
            "status" => 1
        ]);

    }


    public static function addStaff($staff_id){
        $staff_details = self::getRequest($staff_id);
        $university_id = University::getInstitutionId($staff_details->institution_name);
        $status = User::create([
           "name" => $staff_details->name,
            "email" => $staff_details->email_address,
            "password" => Hash::make($staff_details->email_address),
            "phone_number" => $staff_details->phone_number,
            "user_type" => 1,
            "university_id" => $university_id->id,
            "token" => Str::Random(16),
        ]);
        if($status){
            self::updateRequestStatus($staff_id);
            return true;
        }
        else{
            return false;
        }
    }

    public static function  deleteRequest($staff_id){
        $delete_request_status = Request::where('staff_id', $staff_id)->delete();
        if ($delete_request_status){
            return true;
        }
        else{
            return false;
        }
    }

}
