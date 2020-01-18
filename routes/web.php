<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('/request-access',[
    'uses' => 'Homepage\HomepageController@displayRequestForm',
    'as' => 'request_form'
]);
Route::get('logout',[
    'uses' => 'Homepage\HomepageController@Logout',
    'as' => 'logout'
]);

Route::post('/submit-request-access',[
    'uses' => 'Homepage\HomepageController@submitRequestForm',
    'as' => 'submit-request-form',
]);

Route::get('/admin/dashboard',[
    'uses' => 'Admin\DashboardController@Dashboard',
    'as' => 'admin.dashboard',
])->middleware('checkAdmin');

Route::get('/user/dashboard',[
    'uses' => 'Homepage\HomepageController@userDashboard',
    'as' => 'user.dashboard',
])->middleware('checkAuth');

Route::get('/admin/add-staff/{staff_id}',[
    'uses' => 'Admin\RequestController@AddStaff',
    'as' => 'admin.add-staff',
])->middleware('checkAdmin');
Route::get('/admin/delete-request/{staff_id}',[
    'uses' => 'Admin\RequestController@DeleteRequest',
    'as' => 'admin.delete-request',
])->middleware('checkAdmin');

Route::post('user/login',[
    'uses' => 'Homepage\HomepageController@Login',
    'as' => 'user.login',
]);

Route::post('user/submit-add-student-form',[
    'uses' => 'Staff\StaffController@submitAddStudentForm',
    'as' => 'user.submit-add-student-form',
])->middleware("checkStaff");

Route::post('user/submit-add-multiple-students',[
    'uses' => 'Staff\StaffController@submitAddMultipleStudents',
    'as' => 'user.submit-add-multiple-students',
])->middleware("checkStaff");

Route::get('/user/add-student',[
    'uses' => 'Staff\StaffController@addStudent',
    'as' => 'user.add-student',
])->middleware('checkStaff');

Route::post('/user/update-student-info/{id}',[
    'uses' => 'Staff\StaffController@updateStudentDetails',
    'as' => 'user.update-student-info',
])->middleware('checkStaffEligibility');

Route::get('/user/add-staff',[
    'uses' => 'Staff\StaffController@addStaff',
    'as' => 'user.add-staff',
])->middleware('checkStaff');

Route::get('/update-bio-data',[
    'uses' => 'Staff\StaffController@updateBioData',
    'as' => 'update-bio-data',
])->middleware('checkStaff');

Route::get('user/update-user-biodata/{id}',[
    'uses' => 'Staff\StaffController@updateStudentBiodata',
    'as' => 'user.update-user-biodata',
])->middleware('checkStaffEligibility');

Route::get('staff/upload-student-result',[
    'uses' => 'Staff\StaffController@uploadStudentResult',
    'as' => 'staff.upload-student-result',
])->middleware('checkStaff');

Route::post('user/submit-add-staff-form',[
    'uses' => 'Staff\StaffController@submitAddStaffForm',
    'as' => 'user.submit-add-staff-form',
])->middleware('checkStaff');

Route::post('user/submit-add-student-biodata/{id}',[
    'uses' => 'Staff\StaffController@submitAddStudentBiodata',
    'as' => 'user.submit-add-student-biodata',
])->middleware("checkStaffEligibility");

Route::post('user/submit-update-student-biodata/{id}',[
    'uses' => 'Staff\StaffController@submitUpdateStudentBiodata',
    'as' => 'user.submit-update-student-biodata',
])->middleware("checkStaffEligibility");

Route::post('user/select-semester',[
    'uses' => 'Staff\StaffController@selectSemester',
    'as' => 'user.select-semester',
])->middleware("checkStaff");

Route::post('user/process-student-result',[
    'uses' => 'Staff\StaffController@processResult',
    'as' => 'user.process-student-result',
])->middleware("checkStaff");
