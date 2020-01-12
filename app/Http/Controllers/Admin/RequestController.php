<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{

    public function AddStaff($staff_id){
        $status = \App\Request::addStaff($staff_id);
        if($status){
            return redirect()->back()->with('success', "staff successfully added");
        }
        else{
            return redirect()->back()->with('failure', "staff could not be added");
        }
    }

    public function DeleteRequest($staff_id){
        $status = \App\Request::deleteRequest($staff_id);
        if($status){
            return redirect()->back()->with('success', "request successfully deleted");
        }
        else{
            return redirect()->back()->with('failure', "request could not be deleted");
        }
    }
}
