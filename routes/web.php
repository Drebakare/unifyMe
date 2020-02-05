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

Route::get('nuc/view-bio-data',[
    'uses' => 'Staff\StaffController@NucupdateBioData',
    'as' => 'nuc.update-bio-data',
])->middleware('checkNuc');

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

Route::post('admin/submit-add-nuc-staff-form',[
    'uses' => 'Admin\AdminController@submitAddNUCStaffForm',
    'as' => 'admin.submit-add-nuc-staff-form',
])->middleware('checkAdmin');

Route::post('admin/submit-add-year-form',[
    'uses' => 'Admin\AdminController@submitAddYearForm',
    'as' => 'admin.submit-add-year-form',
])->middleware('checkAdmin');

Route::post('admin/submit-add-company-form',[
    'uses' => 'Admin\AdminController@submitAddCompanyForm',
    'as' => 'admin.submit-add-company-form',
])->middleware('checkAdmin');

Route::post('user/submit-add-student-biodata/{id}',[
    'uses' => 'Staff\StaffController@submitAddStudentBiodata',
    'as' => 'user.submit-add-student-biodata',
])->middleware("checkStaffEligibility");

Route::post('user/submit-update-student-biodata/{id}',[
    'uses' => 'Staff\StaffController@submitUpdateStudentBiodata',
    'as' => 'user.submit-update-student-biodata',
])->middleware("checkStaffEligibility");

Route::get('user/view-student-result/{id}',[
    'uses' => 'Staff\StaffController@viewStudentResult',
    'as' => 'user.view-student-result',
])->middleware("checkStaffEligibility");

Route::get('nuc/view-student-result/{id}',[
    'uses' => 'Staff\StaffController@viewStudentResult',
    'as' => 'user.nuc-view-student-result',
])->middleware("checkNuc");

Route::get('user/external-view-result/{request_id}',[
    'uses' => 'Staff\StaffController@externalViewResult',
    'as' => 'user.external-view-result',
])->middleware("checkResultEligibility");

Route::post('user/select-semester',[
    'uses' => 'Staff\StaffController@selectSemester',
    'as' => 'user.select-semester',
])->middleware("checkStaff");

Route::post('user/process-student-result',[
    'uses' => 'Staff\StaffController@processResult',
    'as' => 'user.process-student-result',
])->middleware("checkStaff");

Route::post('user/process-update-student-result',[
    'uses' => 'Staff\StaffController@processUpdateResult',
    'as' => 'user.process-update-student-result',
])->middleware("checkStaff");

Route::get('user/view-results',[
    'uses' => 'Staff\StaffController@viewResult',
    'as' => 'user.view-results',
])->middleware('checkStaff');

Route::get('NUC/view-results',[
    'uses' => 'Staff\StaffController@viewNUCResult',
    'as' => 'nuc.view-results',
])->middleware('checkNuc');

Route::get('user/accept-requests/{id}{request_id}',[
    'uses' => 'Staff\StaffController@acceptRequest',
    'as' => 'user.accept-requests',
])->middleware('checkStaffEligibility');

Route::get('user/reject-requests/{id}{request_id}',[
    'uses' => 'Staff\StaffController@rejectRequest',
    'as' => 'user.reject-requests',
])->middleware('checkStaffEligibility');

Route::get('user/view-requests',[
    'uses' => 'Staff\StaffController@viewRequest',
    'as' => 'user.view-requests',
])->middleware('checkStaff');

Route::get('user/view-request-status',[
    'uses' => 'Staff\StaffController@viewRequestStatus',
    'as' => 'user.view-request-status',
])->middleware('checkAuth');

Route::get('user/request-result',[
    'uses' => 'Staff\StaffController@requestResult',
    'as' => 'user.request-result',
])->middleware('checkAuth');

Route::get('user/final-request/access/{id}',[
    'uses' => 'Staff\StaffController@finalRequestAccess',
    'as' => 'user.final-request.access',
])->middleware('checkAuth');

Route::get('user/system-settings',[
    'uses' => 'Staff\StaffController@systemSettings',
    'as' => 'user.system-settings',
])->middleware('checkStaff');

Route::get('user/change-password',[
    'uses' => 'Homepage\HomepageController@changePassword',
    'as' => 'user.change-password',
])->middleware('checkAuth');

Route::get('user/add-faculty',[
    'uses' => 'Staff\StaffController@addFaculty',
    'as' => 'user.add-faculty',
])->middleware('checkStaff');

Route::get('admin/add-university',[
    'uses' => 'Admin\AdminController@addUniversity',
    'as' => 'user.add-university',
])->middleware('checkAdmin');

Route::get('user/add-department',[
    'uses' => 'Staff\StaffController@addDepartment',
    'as' => 'user.add-department',
])->middleware('checkStaff');

Route::post('user/update-change-password',[
    'uses' => 'Homepage\HomepageController@updateChangePassword',
    'as' => 'user.update-change-password',
])->middleware('checkAuth');

Route::post('user/update-add-faculty',[
    'uses' => 'Staff\StaffController@updateAddFaculty',
    'as' => 'user.update-add-faculty',
])->middleware('checkStaff');

Route::post('add/update-add-university',[
    'uses' => 'Admin\AdminController@updateAddUniversity',
    'as' => 'user.update-add-university',
])->middleware('checkAuth');

Route::post('user/update-add-department',[
    'uses' => 'Staff\StaffController@updateAddDepartment',
    'as' => 'user.update-add-department',
])->middleware('checkStaff');

Route::post('user/update-system-settings',[
    'uses' => 'Staff\StaffController@updateSystemSettings',
    'as' => 'user.update-system-settings',
])->middleware('checkStaff');

Route::post('user/request-for-student',[
    'uses' => 'Staff\StaffController@getRequestStudents',
    'as' => 'user.request-for-student',
])->middleware('checkAuth');

Route::get('admin/add-nuc-staff',[
    'uses' => 'Admin\AdminController@addNUCStaffs',
    'as' => 'user.add-nuc-staff',
])->middleware('checkAdmin');

Route::get('admin/add-company',[
    'uses' => 'Admin\AdminController@addCompany',
    'as' => 'user.add-company',
])->middleware('checkAdmin');

Route::get('admin/view-request',[
    'uses' => 'Admin\AdminController@viewRequest',
    'as' => 'admin.view-request',
])->middleware('checkAdmin');

Route::get('admin/add-academic-year',[
    'uses' => 'Admin\AdminController@addYear',
    'as' => 'admin.add-year',
])->middleware('checkAdmin');

