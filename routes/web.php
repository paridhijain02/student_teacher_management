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
Route::get('/','ProjectController@welcome')->name('register.welcome');

Route::get('/slogin','ProjectController@studentLogin')->name('register.slogin');
Route::post('/slogin','ProjectController@studentPostLogin');

Route::get('/tlogin','ProjectController@teacherLogin')->name('register.tlogin');
Route::post('/tlogin','ProjectController@teacherPostLogin');

Route::get('/alogin','ProjectController@adminLogin')->name('register.alogin');
Route::post('/alogin','ProjectController@adminPostLogin');

Route::get('/ssignup','ProjectController@studentRegistered')->name('sregister.signup');
Route::post('/ssignups','ProjectController@studentStore');

Route::get('/tsignup','ProjectController@teacherRegistered')->name('tregister.signup');
Route::post('/tsignups','ProjectController@teacherStore');

Route::get('/sview','ProjectController@studentView')->name('student.view');
Route::get('/tview','ProjectController@teacherView')->name('teacher.view');

Route::any('/sprofilee', 'ProjectController@studentProfile');
Route::any('/tprofilee', 'ProjectController@teacherProfile');
Route::any('/aprofilee', 'ProjectController@adminProfile');
Route::get('/notexist','ProjectController@notExist');
Route::get('/notloggedin','ProjectController@notLoggedIn');

Route::get('/tprofilee/s_delete/{id}','ProjectController@studentDelete');
Route::get('/tprofilee/s_edit/{id}','ProjectController@studentEdit');
Route::post('/tprofilee/s_update/{id}','ProjectController@studentUpdate');

Route::get('/tprofilee/t_delete/{id}','ProjectController@teacherDelete');
Route::get('/tprofilee/t_edit/{id}','ProjectController@teacherEdit');
Route::post('/tprofilee/t_update/{id}','ProjectController@teacherUpdate');

Route::get('/aprofilee/s_delete/{id}','ProjectController@studentDeletebyadmin');
Route::get('/aprofilee/s_edit/{id}','ProjectController@studentEditbyadmin');
Route::post('/aprofilee/s_update/{id}','ProjectController@studentUpdatebyadmin');

Route::get('/aprofilee/t_delete/{id}','ProjectController@teacherDeletebyadmin');
Route::get('/aprofilee/t_edit/{id}','ProjectController@teacherEditbyadmin');
Route::post('/aprofilee/t_update/{id}','ProjectController@teacherUpdatebyadmin');


Route::get('/create_assignment','ProjectController@createNewAssignment');
Route::post('/create_assignment','ProjectController@createNewAssignmentPost');

Route::get('/my_assignments','ProjectController@teacherMyAsssignment');

Route::get('/assignments_delete/{id}','ProjectController@assignmentDelete');

Route::get('/sprofilee/assignment_write/{id}','ProjectController@assignmentWrite');
Route::post('/sprofilee/assignment_write_post/{id}','ProjectController@assignmentWritePost');
Route::get('/student_assignment_view','ProjectController@studentAssignmentToTeacher');

Route::any('/slogout', function ()
{
    if(session()->has('username'))
    {
        session()->pull('username',null);
    }
    return redirect("/slogin");
});

Route::any('/tlogout', function ()
{
    if(session()->has('username'))
    {
        session()->pull('username',null);
    }
    return redirect("/tlogin");
});
Route::any('/alogout', function ()
{
    if(session()->has('username'))
    {
        session()->pull('username',null);
    }
    return redirect("/alogin");
});



// Route::get('/','ProjectController@login')->name('register.login');
// Route::post('/','ProjectController@post_login');
//Route::get('/youredit/{id}','ProjectController@youredit');