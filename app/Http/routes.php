<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('dashboard/login', ['uses' => 'AdminController@getLogin', 'as' => 'Get.Admin.Login']);
Route::post('dashboard/login', ['uses' => 'AdminController@postLogin', 'as' => 'POST.Admin.Login']);
Route::get('dashboard/logout', ['uses' => 'AdminController@getLogout', 'as' => 'get.logout']);


Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', ['uses' => 'DashboardController@getDashboardIndex']);

    Route::group(['prefix' => 'students'], function () {

        Route::get('list', ['uses' => 'StudentController@getAllStudent', 'as' => 'Get.Student.List']);
        Route::get('search', ['uses' => 'StudentController@getSearchStudent', 'as' => 'Get.Student.Search']);
        Route::get('view/{student_id}', ['uses' => 'StudentController@getViewStudent', 'as' => 'Get.Student.View']);
        Route::get('change/{student_id}', ['uses' => 'StudentController@changeStudentStatus', 'as' => 'Get.Student.Change']);
        Route::delete('delete/{student_id}', ['uses' => 'StudentController@deleteStudent', 'as' => 'Get.Student.Delete']);

    });
});

Route::group(['prefix' => 'student'], function () {

    Route::get('register', ['as' => 'Get.Student.Register', 'uses' => 'StudentController@getRegisterStudent']);

    Route::post('register', ['as' => 'Post.Student.Register', 'uses' => 'StudentController@postRegisterStudent']);
});







