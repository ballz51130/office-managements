<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();


Route::group([
    'middleware'    => ['auth'],
    ], function () {

    ## home
    Route::get('/', 'HomeController@index')->name('home');


    ## users
    Route::get('/users', 'UserController@index')->name('user');
    Route::get('/users/create', 'UserController@create')->name('user.create');
    Route::post('/users', 'UserController@store')->name('user.save');
    Route::get('/users/{user}', 'UserController@show')->name('user.edit');
    Route::get('/users/{user}/account', 'UserController@account')->name('user.account');
    Route::get('/users/{user}/password', 'UserController@password')->name('user.password');
    Route::get('/users/{user}/jobs', 'UserController@jobs')->name('user.jobs');
    Route::get('/users/{user}/docs', 'UserController@docs')->name('user.docs');
    Route::get('/users/{user}/leave', 'UserController@leave')->name('user.leave');



    Route::put('/users/{user}/profile', 'UserController@profile');
    Route::put('/users/{user}/account', 'UserController@saveaccount');
    Route::put('/users/{user}/password', 'UserController@savepassword');
    Route::put('/users/{user}/jobs', 'UserController@savejobs');
    Route::put('/users/{user}/docs', 'UserController@savedocs');
    Route::put('/users/{user}/leave', 'UserController@saveleave');
    Route::delete('/users/{user}', 'UserController@destroy')->name('user.delete');


    ## Position
    Route::get('/position','PositionController@index')->name('position');
    Route::get('/position/create', 'PositionController@create')->name('position.create');
    Route::get('/position/{position}', 'PositionController@show')->name('position.edit');
    Route::post('/position', 'PositionController@store')->name('position.save');
    Route::put('/position/update/{position}','PositionController@update')->name('position.update');

    Route::delete('/position/{position}', 'PositionController@destroy')->name('position.delete');



    ## department
    Route::get('/department','DepartmentController@index')->name('department');
    Route::get('/department/create', 'DepartmentController@create')->name('department.create');
    Route::get('/department/{department}', 'DepartmentController@show')->name('department.edit');
    Route::post('/department', 'DepartmentController@store')->name('department.save');
    Route::put('/department/update/{department}','DepartmentController@update')->name('department.update');

    Route::delete('/department/{department}', 'DepartmentController@destroy')->name('department.delete');

        ## job appications
    Route::get('/jobs','jobsAppicationController@index')->name('jobs');
    Route::get('/jobs/search','jobsAppicationController@search')->name('jobs.search');
    Route::get('/jobs/create', 'jobsAppicationController@create')->name('jobs.create');
    Route::get('/jobs/edit/{jobs}','jobsAppicationController@edit')->name('jobs.edit');
    Route::post('/jobs', 'jobsAppicationController@store')->name('jobs.save');
    Route::post('/jobs/update/{jobs}','jobsAppicationController@update')->name('jobs.update');
    Route::delete('/jobs/{jobs}', 'jobsAppicationController@destroy')->name('jobs.delete');
    Route::get('/jobs/history','jobsAppicationController@history')->name('jobs.history');
    Route::get('jobs/detail/{jobs}','jobsAppicationController@detail')->name('jobs.detail');
    Route::get('/jobs/active','jobsAppicationController@active')->name('jobs.active');
    Route::get('/jobs/notactive','jobsAppicationController@notactive')->name('jobs.notactive');
    Route::get('/jobs/timeout','jobsAppicationController@timeout')->name('jobs.timeout');

    Route::PUT('/jobs/{jobs}','jobsAppicationController@status')->name('jobs.status');

    Route::post('/addproperty','JobsAppicationController@addproperty')->name('job.addproperty');
    Route::post('/addwelfare','JobsAppicationController@addwelfare')->name('job.addwelfare');
    Route::delete('/delproperty/{id}','JobsAppicationController@delproperty')->name('job.delproperty');
    Route::delete('/delwelfare/{id}','JobsAppicationController@delwelfare')->name('job.delwelfare');

    Route::get('jobs/member','jobsAppicationController@memberindex')->name('jobs.member');
    Route::get('jobs/member/create','jobsAppicationController@member_create')->name('jobs.member.create');
    Route::get('jobsmember/edit/{id}','jobsAppicationController@member_edit')->name('jobs.member.edit');
    Route::get('jobsmember/{id}','jobsAppicationController@member_delete')->name('jobs.member.delete');
    Route::get('/jobs/applicationlist','jobsAppicationController@applicationlist')->name('jobs.applicationlist');
    Route::get('/jobs/applicationdetail/{id}','jobsAppicationController@applicationdetail')->name('jobs.applicationdetail');

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

      // clock location
      Route::get('/location','LocationController@index')->name('location');
      Route::get('/location/create','LocationController@create')->name('location.create');
      Route::get('/location/print/{id}','LocationController@print')->name('location.print');
      Route::get('/location/edit/{id}','LocationController@edit')->name('location.edit');
      Route::get('/location/{id}', 'LocationController@destroy')->name('location.delete');

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


   // Route::post('/users/edit/{id}','UserController@edit')->name('user.edit');
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


    // MD
    Route::get('/MD','MDController@index')->name('MD.dashborad');
    Route::get('/salary/MD','SalaryController@dashborad')->name('salary.dashborad');
    Route::get('/salary/MD/cost','SalaryController@cost_md')->name('cost_md');
    Route::get('/salary/MD/cost_detail/{id}','SalaryController@cost_detail_md')->name('cost_detail_md');
    Route::get('/salary/MD/payment','SalaryController@payment_md')->name('payment');
    Route::get('/salary/MD/payment_detail/{id}','SalaryController@payment_detail_md')->name('payment_detail_md');

});
