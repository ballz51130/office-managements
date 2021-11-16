<?php
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Route::get('/login','UserController@login')->name('user');

## Users
// Route::get('/users', 'UserController@index');
// Route::get('/users/create', 'UserController@create');
// Route::resource('/users/store','UserController');


// Route::resource('/users', 'UserController', [
//     'names' => [
//         'index' => 'user',
//         'create' => 'user.create',
//     ]
// ]);

// check auth
Route::group(['middleware' => ['auth']], function () {

    Route::post('/users/edit/{id}','UserController@edit')->name('user.edit');
    Route::get('/users/index','UserController@dashborad')->name('user.dashborad');
    Route::post('/users/update/{id}', 'UserController@update')->name('user.update');
    Route::post('/users/information/{id}','UserController@information')->name('user.information');
    Route::post('/users/profile/{id}', 'UserController@profile')->name('user.profile');
    Route::post('/users/resetpassword/{id}','UserController@resetpassword')->name('user.resetpassword');

    Route::get('/leave/waitcheck','LeaveController@waitcheck')->name('leave.waitcheck');
    Route::get('/leave/active','LeaveController@active')->name('leave.active');
    Route::get('/leave/notactive','LeaveController@notactive')->name('leave.notactive');
    Route::get('/leave/cancelled','LeaveController@cancelled')->name('leave.cancelled');

//User
    Route::group(['middleware' => ['is_user']], function () {

    // leave user
    Route::get('/leave/user/{id}','LeaveController@userindex')->name('leave.user');
    Route::get('/leave/create','LeaveController@usercreate')->name('leave.create');
    Route::post('/leave/user/', 'LeaveController@store')->name('leave.user.save');
    Route::post('/leave/user/edit/{id}','LeaveController@useredit')->name('leave.user.edit');
    Route::post('/leave/update/{id}', 'LeaveController@update')->name('leave.update');
    Route::post('/leave/cancel/{id}','LeaveController@cancel')->name('leave.cancel');

    // request user
    Route::get('/request/member','RequestDocumentsController@request')->name('request.member');
    Route::get('/request/member/show/{id}','RequestDocumentsController@show')->name('request.show');
    Route::get('/request/create','RequestDocumentsController@create')->name('request.create');


});

/*
Route::group(['middleware' => ['is_admin']], function () {

    Route::get('/admin/index','AdminController@index')->name('admin.dashborad');
    Route::post('/users/employment/{id}','UserController@employment')->name('user.employment');
    Route::get('/users','UserController@index')->name('user');
    Route::get('/users/create','UserController@create')->name('user.create');
    Route::get('/search', 'UserController@search')->name('search');
    Route::post('/users', 'UserController@store')->name('user.save');
    Route::delete('/users/{id}', 'UserController@destroy')->name('user.delete');
    Route::get('changeStatus','UserController@ChangeUserStatus');
    Route::get('profile', 'UserController@profile');

    //department
    Route::get('/department','DepartmentController@index')->name('department');
    Route::post('/department', 'DepartmentController@store')->name('department.save');
    Route::post('/department/update/{id}','DepartmentController@update')->name('department.update');
    Route::delete('/department/{id}', 'DepartmentController@destroy')->name('department.delete');

    //position
    Route::get('/position','PositionController@index')->name('position');
    Route::post('/position', 'PositionController@store')->name('position.save');
    Route::post('/position/update/{id}','PositionController@update')->name('position.update');
    Route::delete('/position/{id}','PositionController@destroy')->name('position.delete');

    // Jobs Appication
    Route::get('/jobs','jobsAppicationController@index')->name('jobs');
    Route::get('/jobs/search','jobsAppicationController@search')->name('jobs.search');
    Route::get('/jobs/create', 'jobsAppicationController@create')->name('jobs.create');
    Route::get('/jobs/edit/{id}','jobsAppicationController@edit')->name('jobs.edit');
    Route::post('/jobs', 'jobsAppicationController@store')->name('jobs.save');
    Route::post('/jobs/update/{id}','jobsAppicationController@update')->name('jobs.update');
    Route::delete('/jobs/{id}','jobsAppicationController@destroy')->name('jobs.delete');
    Route::get('/jobs/history','jobsAppicationController@history')->name('jobs.history');
    Route::get('jobs/detail/{id}','jobsAppicationController@detail')->name('jobs.detail');
    Route::get('/jobs/active','jobsAppicationController@active')->name('jobs.active');
    Route::get('/jobs/notactive','jobsAppicationController@notactive')->name('jobs.notactive');
    Route::get('/jobs/timeout','jobsAppicationController@timeout')->name('jobs.timeout');

    Route::post('/addproperty','JobsAppicationController@addproperty')->name('job.addproperty');
    Route::post('/addwelfare','JobsAppicationController@addwelfare')->name('job.addwelfare');
    Route::post('/delproperty/{id}','JobsAppicationController@delproperty')->name('job.delproperty');
    Route::post('/delwelfare/{id}','JobsAppicationController@delwelfare')->name('job.delwelfare');

    // Clocked
    Route::get('/clocked','ClockedController@index')->name('clocked');
    Route::get('/clocked/create','ClockedController@create')->name('clocked.create');
    Route::get('/clocked/dashboard','ClockedController@dashboard')->name('clocked.dashboard');
    Route::post('/clocked/update/{id}', 'ClockedController@update')->name('clocked.update');
    Route::post('/clocked/edit/{id}','ClockedController@edit')->name('clocked.edit');
    Route::delete('/clocked/{id}', 'ClockedController@destroy')->name('clocked.delete');


    // clock setting
    Route::get('/clockedsetting','ClockedSettingController@index')->name('clockedsetting');
    Route::get('/clockedsetting/create','ClockedSettingController@create')->name('clockedsetting.create');
    Route::post('/clockedsetting','ClockedSettingController@edit')->name('clockedsetting.save');
    Route::delete('/clockedsetting/{id}', 'ClockedSettingController@destroy')->name('clockedsetting.delete');

    // clock location
    Route::get('/location','LocationController@index')->name('location');
    Route::get('/location/create','LocationController@create')->name('location.create');
    Route::get('/location/print/{id}','LocationController@print')->name('location.print');
    Route::get('/location/edit/{id}','LocationController@edit')->name('location.edit');
    Route::get('/location/{id}', 'LocationController@destroy')->name('location.delete');
});
*/

Route::group(['middleware' => ['is_HR']], function () {

    Route::get('/HR','HRController@index')->name('HR.index');
    // Leave
    Route::get('/leave','LeaveController@index')->name('leave');
   // Route::get('/leave/create','LeaveController@create')->name('leave.create');
    Route::post('/leave/edit/{id}','LeaveController@edit')->name('leave.edit');
    Route::post('/leave', 'LeaveController@store')->name('leave.save');

    Route::get('/leave/detail/{id}','LeaveController@detail')->name('leave.detail');
    Route::post('/leave/detailupdate/{id}','LeaveController@detailupdate')->name('leave.detail.update');
    Route::get('/leave/search', 'LeaveController@search')->name('search');
    Route::get('/leave/report','LeaveController@report')->name('leave.report');
    Route::get('/leave/history','LeaveController@history')->name('leave.history');
    Route::post('/leave/edit/{id}','LeaveController@useredits')->name('leave.user.edits');

    // salary
    Route::get('/salary','SalaryController@index')->name('salary');
    Route::get('/salary/create','SalaryController@create')->name('salary.create');
    Route::get('/salary/detail','SalaryController@detail')->name('salary.detail');
    Route::get('/salary/history','SalaryController@history')->name('salary.history');
    Route::get('/salary/historydetail/{id}','SalaryController@historydetail')->name('salary.historydetail');
    Route::get('/salary/printsalary','SalaryController@printsalary')->name('salary.printsalary');
    Route::get('/salary/printdetail','SalaryController@printdetail')->name('salary.printdetail');

    // HR
    Route::get('/salary/cost','SalaryController@cost')->name('cost');
    Route::get('/salary/cost_detail/{id}','SalaryController@cost_detail')->name('cost_detail');
    Route::get('/salary/payment','SalaryController@payment')->name('payment');
    Route::get('/salary/payment_detail/{id}','SalaryController@payment_detail')->name('payment_detail');

    // request Document
    Route::get('/request','RequestDocumentsController@index')->name('request');
    Route::get('/request/checkrequset/{id}','RequestDocumentsController@checkrequset')->name('request.checkrequset');
});

//MD
Route::group(['middleware' => ['is_MD']], function () {
    Route::get('/MD','MDController@index')->name('MD.dashborad');
    Route::get('/salary/MD','SalaryController@dashborad')->name('salary.dashborad');
    Route::get('/salary/MD/cost','SalaryController@cost_md')->name('cost_md');
    Route::get('/salary/MD/cost_detail/{id}','SalaryController@cost_detail_md')->name('cost_detail_md');
    Route::get('/salary/MD/payment','SalaryController@payment_md')->name('payment');
    Route::get('/salary/MD/payment_detail/{id}','SalaryController@payment_detail_md')->name('payment_detail_md');
});


}); // end middleware auth

// หน้าที่ไม่ต้องทำการ Login
Route::get('jobs/member','jobsAppicationController@memberindex')->name('jobs.member');
Route::get('jobs/member/create','jobsAppicationController@member_create')->name('jobs.member.create');
Route::get('jobsmember/edit/{id}','jobsAppicationController@member_edit')->name('jobs.member.edit');
Route::get('jobsmember/{id}','jobsAppicationController@member_delete')->name('jobs.member.delete');
Route::get('/jobs/applicationlist','jobsAppicationController@applicationlist')->name('jobs.applicationlist');
Route::get('/jobs/applicationdetail/{id}','jobsAppicationController@applicationdetail')->name('jobs.applicationdetail');

// Route::get('/users/:id', 'UserController@show');
// Route::get('/users/edit/:id', 'UserController@edit');
// Route::put('/users/:id', 'UserController@update');
// Route::delete('/users/:id', 'UserController@destroy');
