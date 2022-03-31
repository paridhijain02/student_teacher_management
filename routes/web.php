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



Route::get('/ssignup','register_con@screate')->name('sregister.signup');
Route::post('/ssignups','register_con@sstore');

Route::get('/tsignup','register_con@tcreate')->name('tregister.signup');
Route::post('/tsignups','register_con@tstore');

Route::get('/sview','register_con@sview')->name('student.view');
Route::get('/tview','register_con@tview')->name('teacher.view');

// Route::get('/','register_con@login')->name('register.login');
// Route::post('/','register_con@post_login');

Route::get('/slogin','register_con@slogin')->name('register.slogin');
Route::post('/slogin','register_con@spost_login');

Route::get('/tlogin','register_con@tlogin')->name('register.tlogin');
Route::post('/tlogin','register_con@tpost_login');

Route::get('/tprofilee/s_delete/{id}','register_con@s_delete');
Route::get('/tprofilee/s_edit/{id}','register_con@s_edit');
Route::post('/tprofilee/s_update/{id}','register_con@s_update');

Route::get('/tprofilee/t_delete/{id}','register_con@t_delete');
Route::get('/tprofilee/t_edit/{id}','register_con@t_edit');
Route::post('/tprofilee/t_update/{id}','register_con@t_update');

Route::get('/create_assignment','register_con@create_assignment');
Route::post('/create_assignment','register_con@create_assignment_post');

Route::get('/my_assignments','register_con@my_assignments');

Route::get('/assignments_delete/{id}','register_con@assignments_delete');

Route::get('/notexist','register_con@notexist');

Route::any('/sprofilee', 'register_con@sprofile');

Route::any('/tprofilee', 'register_con@tprofile');

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
//Route::get('/youredit/{id}','register_con@youredit');


Route::get('/','register_con@welcome')->name('register.welcome');

Route::get('/sprofilee/assignment_write/{id}','register_con@assignment_write');
Route::post('/sprofilee/assignment_write_post/{id}','register_con@assignment_write_post');
Route::get('/student_assignment_view','register_con@student_assignment_view');