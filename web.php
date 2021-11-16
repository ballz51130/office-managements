<?php

use App\Mail\TestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');
Auth::routes();

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/user', 'Auth\LoginController@showUserLoginForm');

Route::get('/login/blogger', 'Auth\LoginController@showBloggerLoginForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/blogger', 'Auth\LoginController@bloggerLogin');



Route::group([
    'middleware' => ['auth:admin'],
], function () {
    Route::get('/', function () {
        return view('admin.dashborad');
    });
    Route::get('/users', 'UserController@index')->name('user');
        Route::get('/users/create', 'UserController@create')->name('user.create');
        Route::post('/users', 'UserController@store')->name('user.save');
        Route::get('/users/departments','DepartmentController@index')->name('department');
        Route::get('/users/positions','PositionController@index')->name('position');
        Route::get('/users/{user}', 'UserController@show')->name('user.edit');
        Route::get('/users/{user}/account', 'UserController@account')->name('user.account');
        Route::get('/users/{user}/password', 'UserController@password')->name('user.password');
        Route::get('/users/{user}/jobs', 'UserController@jobs')->name('user.jobs');
        Route::get('/users/{user}/docs', 'UserController@docs')->name('user.docs');
        Route::get('/users/leave/{leave}', 'UserController@leavedetail')->name('user.leavedetail');
        Route::get('/users/{user}/leave', 'UserController@leave')->name('user.leave');
        
        Route::post('download/{user}', 'UserController@getFile')->name('getfile');
        Route::post('admingetfileleave/{leave}', 'UserController@admingetfileleave')->name('admingetfileleave');
        
        Route::get('changeStatus', 'UserController@changeStatus');
    
        Route::put('/users/{user}/profile', 'UserController@profile');
        Route::put('/users/{user}/account', 'UserController@saveaccount');
        Route::put('/users/{user}/password', 'UserController@savepassword');
        Route::put('/users/{user}/jobs', 'UserController@savejobs');
        Route::put('/users/{user}/docs', 'UserController@savedocs');
        Route::put('/users/{user}/leave', 'UserController@saveleave');
        Route::delete('/users/{user}', 'UserController@destroy')->name('user.delete');
        Route::delete('/users/identification_card/{user}','UserController@identification_card');
        Route::delete('/users/house_registration/{user}','UserController@house_registration');
        Route::delete('/users/etc/{user}','UserController@etc');
    
    
        ## Position
        Route::get('/users/positions/create', 'PositionController@create')->name('position.create');
        Route::get('/users/positions/{position}', 'PositionController@show')->name('position.edit');
        Route::post('/users/positions', 'PositionController@store')->name('position.save');
        Route::put('/users/positions/update/{position}','PositionController@update')->name('position.update');
        Route::delete('/users/positions/{position}', 'PositionController@destroy')->name('position.delete');
    
    
    
        ## department
        Route::get('/users/departments/create', 'DepartmentController@create')->name('department.create');
        Route::get('/users/departments/{department}', 'DepartmentController@show')->name('department.edit');
        Route::post('/users/departments', 'DepartmentController@store')->name('department.save');
        Route::put('/users/departments/update/{department}','DepartmentController@update')->name('department.update');
        Route::delete('/users/departments/{department}', 'DepartmentController@destroy')->name('department.delete');
    
        Route::get('/leaves','LeaveController@index')->name('leave');
        Route::get('/leaves/create','LeaveController@create')->name('leave.create');
        Route::post('/leaves/edit/{id}','LeaveController@edit')->name('leave.edit');
        Route::post('/leaves', 'LeaveController@store')->name('leave.save');

        Route::get('/leaves/detail/{leave}','LeaveController@detail')->name('leave.detail');
        Route::post('/leaves/detailupdate/{id}','LeaveController@detailupdate')->name('leave.detail.update');
        Route::get('/leaves/search', 'LeaveController@search')->name('search');
        Route::get('/leaves/report','LeaveController@report')->name('leave.report');
        Route::get('/leaves/history','LeaveController@history')->name('leave.history');
        Route::post('/leaves/edit/{id}','LeaveController@useredits')->name('leave.user.edits');
        Route::get('/leaves/waitcheck','LeaveController@waitcheck')->name('leave.waitcheck');
        Route::get('/leaves/active','LeaveController@active')->name('leave.active');
        Route::get('/leaves/notactive','LeaveController@notactive')->name('leave.notactive');
        Route::get('/leaves/cancelled','LeaveController@cancelled')->name('leave.cancelled');
    Route::get('/leaves/export', 'LeaveController@export'); 

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
        Route::post('/delproperty/{id}','JobsAppicationController@delproperty')->name('job.delproperty');
        Route::post('/delwelfare/{id}','JobsAppicationController@delwelfare')->name('job.delwelfare');
    
        // job Candidate
        Route::get('/jobs/candidates','CandidatelistContorller@index')->name('candidate');
        Route::get('/jobs/candidates/edit/{registration}','CandidatelistContorller@edit')->name('candidate.edit');
        Route::post('/jobs/candidates/update/{registration}','CandidatelistContorller@update')->name('candidate.update');
    
        // job interviewlist
        Route::get('/jobs/interviewlists','InterviewlistContorller@index')->name('Interviewlist');
        Route::get('/jobs/interviewlists/edit/{interviewlist}','InterviewlistContorller@edit')->name('Interviewlist.edit');
        Route::post('/jobs/interviewlists/update/{interviewlist}','InterviewlistContorller@update')->name('Interviewlist.update');
    
         // job Interview history
         Route::get('/jobs/interviewhistory','InterviewlistContorller@history')->name('Interviewhistory');
         Route::get('/jobs/interviewhistory/detail/{interviewhistory}','InterviewlistContorller@detail')->name('Interviewhistory.detail');
    
    
        Route::get('/jobs/applicationlist','jobsAppicationController@applicationlist')->name('jobs.applicationlist');
        Route::get('/jobs/applicationdetail/{id}','jobsAppicationController@applicationdetail')->name('jobs.applicationdetail');
    
        Route::get('/jobs/{jobs}', function ()
        {
            return abort(404);
        });
    
  
});

// Route::group([
//     'middleware' => ['auth:blogger'],
// ], function () {

//     Route::get('/', function () {
//         return view('blogger');
//     });
    
// });

Route::group([
    'middleware' => ['auth'],
], function () {
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::get('/s', function () {
        return view('users.leaves.index');
    });
    Route::get('/leave','user\LeavesController@index')->name('leaves');

    Route::get('/leave/create','user\LeavesController@create')->name('leaves.create');
    Route::get('/leave/detail','user\LeavesController@detail')->name('leaves.detail');
    Route::get('/leave/detail/{leave}','user\LeavesController@fulldetail')->name('leaves.fulldetail');
    Route::post('/leave/detail','user\LeavesController@detail')->name('leaves.details');
    //Route::get('/login','LeavesController@index')->name('login');
    Route::put('/leave','user\LeavesController@store')->name('leaves.save');
    Route::post('downloadleave/{leave}', 'user\LeavesController@getFileleave')->name('getfileleave');


});

Route::get('/job', 'JobsController@jobslist')->name('job.index');

Route::get('/job/jobslist','JobsController@jobslist')->name('job.jobslist');
Route::get('/job/jobsdetail/{job}','JobsController@jobsdetail')->name('job.jobsdetail');
Route::get('/job/creates/{job}','JobsController@jobscreate')->name('job.create');
Route::put('/job/{job}', 'JobsController@store')->name('job.update');




// Auth::routes();


// Route::group([
//     'middleware'    => ['auth'],
//     ], function () {

//     ## home
//     Route::get('/', 'HomeController@index')->name('home');

//     ## users
//     Route::get('/users', 'UserController@index')->name('user');
//     Route::get('/users/create', 'UserController@create')->name('user.create');
//     Route::post('/users', 'UserController@store')->name('user.save');
//     Route::get('/users/departments','DepartmentController@index')->name('department');
//     Route::get('/users/positions','PositionController@index')->name('position');
//     Route::get('/users/{user}', 'UserController@show')->name('user.edit');
//     Route::get('/users/{user}/account', 'UserController@account')->name('user.account');
//     Route::get('/users/{user}/password', 'UserController@password')->name('user.password');
//     Route::get('/users/{user}/jobs', 'UserController@jobs')->name('user.jobs');
//     Route::get('/users/{user}/docs', 'UserController@docs')->name('user.docs');
//     Route::get('/users/leave/{leave}', 'UserController@leavedetail')->name('user.leavedetail');
//     Route::get('/users/{user}/leave', 'UserController@leave')->name('user.leave');
    
//     Route::post('download/{user}', 'UserController@getFile')->name('getfile');
//     Route::get('changeStatus', 'UserController@changeStatus');

//     Route::put('/users/{user}/profile', 'UserController@profile');
//     Route::put('/users/{user}/account', 'UserController@saveaccount');
//     Route::put('/users/{user}/password', 'UserController@savepassword');
//     Route::put('/users/{user}/jobs', 'UserController@savejobs');
//     Route::put('/users/{user}/docs', 'UserController@savedocs');
//     Route::put('/users/{user}/leave', 'UserController@saveleave');
//     Route::delete('/users/{user}', 'UserController@destroy')->name('user.delete');
//     Route::delete('/users/identification_card/{user}','UserController@identification_card');
//     Route::delete('/users/house_registration/{user}','UserController@house_registration');
//     Route::delete('/users/etc/{user}','UserController@etc');


//     ## Position
//     Route::get('/users/positions/create', 'PositionController@create')->name('position.create');
//     Route::get('/users/positions/{position}', 'PositionController@show')->name('position.edit');
//     Route::post('/users/positions', 'PositionController@store')->name('position.save');
//     Route::put('/users/positions/update/{position}','PositionController@update')->name('position.update');
//     Route::delete('/users/positions/{position}', 'PositionController@destroy')->name('position.delete');



//     ## department
//     Route::get('/users/departments/create', 'DepartmentController@create')->name('department.create');
//     Route::get('/users/departments/{department}', 'DepartmentController@show')->name('department.edit');
//     Route::post('/users/departments', 'DepartmentController@store')->name('department.save');
//     Route::put('/users/departments/update/{department}','DepartmentController@update')->name('department.update');
//     Route::delete('/users/departments/{department}', 'DepartmentController@destroy')->name('department.delete');





//     ## job appications
//     Route::get('/jobs','jobsAppicationController@index')->name('jobs');
//     Route::get('/jobs/search','jobsAppicationController@search')->name('jobs.search');
//     Route::get('/jobs/create', 'jobsAppicationController@create')->name('jobs.create');
//     Route::get('/jobs/edit/{jobs}','jobsAppicationController@edit')->name('jobs.edit');
//     Route::post('/jobs', 'jobsAppicationController@store')->name('jobs.save');
//     Route::post('/jobs/update/{jobs}','jobsAppicationController@update')->name('jobs.update');
//     Route::delete('/jobs/{jobs}', 'jobsAppicationController@destroy')->name('jobs.delete');

//     Route::get('/jobs/history','jobsAppicationController@history')->name('jobs.history');
//     Route::get('jobs/detail/{jobs}','jobsAppicationController@detail')->name('jobs.detail');
//     Route::get('/jobs/active','jobsAppicationController@active')->name('jobs.active');
//     Route::get('/jobs/notactive','jobsAppicationController@notactive')->name('jobs.notactive');
//     Route::get('/jobs/timeout','jobsAppicationController@timeout')->name('jobs.timeout');

//     Route::PUT('/jobs/{jobs}','jobsAppicationController@status')->name('jobs.status');

//     Route::post('/addproperty','JobsAppicationController@addproperty')->name('job.addproperty');
//     Route::post('/addwelfare','JobsAppicationController@addwelfare')->name('job.addwelfare');
//     Route::post('/delproperty/{id}','JobsAppicationController@delproperty')->name('job.delproperty');
//     Route::post('/delwelfare/{id}','JobsAppicationController@delwelfare')->name('job.delwelfare');

//     // job Candidate
//     Route::get('/jobs/candidates','CandidatelistContorller@index')->name('candidate');
//     Route::get('/jobs/candidates/edit/{registration}','CandidatelistContorller@edit')->name('candidate.edit');
//     Route::post('/jobs/candidates/update/{registration}','CandidatelistContorller@update')->name('candidate.update');

//     // job interviewlist
//     Route::get('/jobs/interviewlists','InterviewlistContorller@index')->name('Interviewlist');
//     Route::get('/jobs/interviewlists/edit/{interviewlist}','InterviewlistContorller@edit')->name('Interviewlist.edit');
//     Route::post('/jobs/interviewlists/update/{interviewlist}','InterviewlistContorller@update')->name('Interviewlist.update');

//      // job Interview history
//      Route::get('/jobs/interviewhistory','InterviewlistContorller@history')->name('Interviewhistory');
//      Route::get('/jobs/interviewhistory/detail/{interviewhistory}','InterviewlistContorller@detail')->name('Interviewhistory.detail');


//     Route::get('/jobs/applicationlist','jobsAppicationController@applicationlist')->name('jobs.applicationlist');
//     Route::get('/jobs/applicationdetail/{id}','jobsAppicationController@applicationdetail')->name('jobs.applicationdetail');

//     Route::get('/jobs/{jobs}', function ()
//     {
//         return abort(404);
//     });
//          // Clocked
//     Route::get('/clocks','ClockedController@index')->name('clocked');
//     Route::get('/clocks/create','ClockedController@create')->name('clocked.create');
//     Route::get('/clocks/dashboard','ClockedController@dashboard')->name('clocked.dashboard');
//     Route::post('/clocks/update/{id}', 'ClockedController@update')->name('clocked.update');
//     Route::post('/clocks/edit/{id}','ClockedController@edit')->name('clocked.edit');
//     Route::delete('/clocks/{id}', 'ClockedController@destroy')->name('clocked.delete');

//     // clock setting
//     Route::get('/clockssetting','ClockedSettingController@index')->name('clockedsetting');
//     Route::get('/clockssetting/create','ClockedSettingController@create')->name('clockedsetting.create');
//     Route::post('/clockssetting','ClockedSettingController@edit')->name('clockedsetting.save');
//     Route::delete('/clockssetting/{id}', 'ClockedSettingController@destroy')->name('clockedsetting.delete');

//     // clock location
//     Route::get('/locations','LocationController@index')->name('location');
//     Route::get('/locations/create','LocationController@create')->name('location.create');
//     Route::get('/locations/print/{id}','LocationController@print')->name('location.print');
//     Route::get('/locations/edit/{id}','LocationController@edit')->name('location.edit');
//     Route::get('/locations/{id}', 'LocationController@destroy')->name('location.delete');

//     Route::get('/leaves','LeaveController@index')->name('leave');
//     Route::get('/leaves/create','LeaveController@create')->name('leave.create');
//     Route::post('/leaves/edit/{id}','LeaveController@edit')->name('leave.edit');
//     Route::post('/leaves', 'LeaveController@store')->name('leave.save');

//     Route::get('/leaves/detail/{leave}','LeaveController@detail')->name('leave.detail');
//     Route::post('/leaves/detailupdate/{id}','LeaveController@detailupdate')->name('leave.detail.update');
//     Route::get('/leaves/search', 'LeaveController@search')->name('search');
//     Route::get('/leaves/report','LeaveController@report')->name('leave.report');
//     Route::get('/leaves/history','LeaveController@history')->name('leave.history');
//     Route::post('/leaves/edit/{id}','LeaveController@useredits')->name('leave.user.edits');

//     Route::get('/leaves/export', 'LeaveController@export'); 

//     // salary
//     Route::get('/salarys','SalaryController@index')->name('salary');
//     Route::get('/salarys/create','SalaryController@create')->name('salary.create');
//     Route::get('/salarys/detail','SalaryController@detail')->name('salary.detail');
//     Route::get('/salarys/history','SalaryController@history')->name('salary.history');
//     Route::get('/salarys/historydetail/{id}','SalaryController@historydetail')->name('salary.historydetail');
//     Route::get('/salarys/printsalary','SalaryController@printsalary')->name('salary.printsalary');
//     Route::get('/salarys/printdetail','SalaryController@printdetail')->name('salary.printdetail');

//     // HR
//     Route::get('/salary/cost','SalaryController@cost')->name('cost');
//     Route::get('/salary/cost_detail/{id}','SalaryController@cost_detail')->name('cost_detail');
//     Route::get('/salary/payment','SalaryController@payment')->name('payment');
//     Route::get('/salary/payment_detail/{id}','SalaryController@payment_detail')->name('payment_detail');

//     // request Document
//     Route::get('/request','RequestDocumentsController@index')->name('request');
//     Route::get('/request/checkrequset/{id}','RequestDocumentsController@checkrequset')->name('request.checkrequset');


//    // Route::post('/users/edit/{id}','UserController@edit')->name('user.edit');
//     Route::get('/users/index','UserController@dashborad')->name('user.dashborad');
//     Route::post('/users/update/{id}', 'UserController@update')->name('user.update');
//     Route::post('/users/information/{id}','UserController@information')->name('user.information');
//     Route::post('/users/profile/{id}', 'UserController@profile')->name('user.profile');
//     Route::post('/users/resetpassword/{id}','UserController@resetpassword')->name('user.resetpassword');

//     Route::get('/leaves/waitcheck','LeaveController@waitcheck')->name('leave.waitcheck');
//     Route::get('/leaves/active','LeaveController@active')->name('leave.active');
//     Route::get('/leaves/notactive','LeaveController@notactive')->name('leave.notactive');
//     Route::get('/leaves/cancelled','LeaveController@cancelled')->name('leave.cancelled');

//     //User

//     // leave user
//     Route::get('/leaves/user/{id}','LeaveController@userindex')->name('leave.user');
//     Route::get('/leaves/create','LeaveController@usercreate')->name('leave.create');
//     Route::post('/leaves/user/', 'LeaveController@store')->name('leave.user.save');
//     Route::post('/leaves/user/edit/{id}','LeaveController@useredit')->name('leave.user.edit');
//     Route::post('/leaves/update/{id}', 'LeaveController@update')->name('leave.update');
//     Route::post('/leaves/cancel/{id}','LeaveController@cancel')->name('leave.cancel');

//     // request user
//     Route::get('/request/member','RequestDocumentsController@request')->name('request.member');
//     Route::get('/request/member/show/{id}','RequestDocumentsController@show')->name('request.show');
//     Route::get('/request/create','RequestDocumentsController@create')->name('request.create');


//     // MD
//     Route::get('/MD','MDController@index')->name('MD.dashborad');
//     Route::get('/salarys/MD','SalaryController@dashborad')->name('salary.dashborad');
//     Route::get('/salarys/MD/cost','SalaryController@cost_md')->name('cost_md');
//     Route::get('/salarys/MD/cost_detail/{id}','SalaryController@cost_detail_md')->name('cost_detail_md');
//     Route::get('/salarys/MD/payment','SalaryController@payment_md')->name('payment');
//     Route::get('/salarys/MD/payment_detail/{id}','SalaryController@payment_detail_md')->name('payment_detail_md');

// });




// Route::get('/send-mail', function ()
// {
//     // 1. set .env
//     // To customise the markdown: php artisan vendor:publish --tag=laravel-mail
//     // 2. create mail => php artisan make:mail TestMail --markdown=emails.testMail


//     Mail::to('text@email.com')->send(new TestMail());
//     dd( 'Test Mail Ok!!' );
// });
