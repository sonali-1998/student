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



    Route::get('/', function ()
    {
        return view('welcome');
    });


    Route::resource('sections', 'SectionController');

    Route::resource('classes', 'ClassController');

    Route::resource('students', 'StudentController');

    Route::resource('attendances', 'AttendanceController');

    Route::post('/attendance', 'AttendanceController@store');

    Route::get('logout', 'Auth\LoginController@logout');

    Route::get('multi', 'StudentController@import');
    Route::post('bulk-upload', 'StudentController@bulkUpload');

    Route::get('multi', 'StudentController@import');

    Route::get('getStudentByClass/{sid}/{cid}', 'AttendanceController@getStudents');

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function ()
    {
        Route::get('/', 'Auth\LoginController@showLoginForm');
        Route::post('login', 'Auth\LoginController@login');
        Route::get('logout', 'Auth\LoginController@logout');
    });





    