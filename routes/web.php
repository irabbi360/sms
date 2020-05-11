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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function (){
    //department
    Route::get('departments', 'DepartmentController@index');
    Route::get('department/create', 'DepartmentController@create');
    Route::post('department/save', 'DepartmentController@save');
    Route::get('department/edit/{id}', 'DepartmentController@edit');
    Route::post('department/update/{id}', 'DepartmentController@update');
    Route::delete('department/delete/{id}', 'DepartmentController@delete');

//classes
    Route::get('classes','ClassController@index');
    Route::get('class/create','ClassController@create');
    Route::post('class/save','ClassController@save');
    Route::get('class/edit/{id}','ClassController@edit');
    Route::post('class/update/{id}','ClassController@update');
    Route::delete('class/delete/{id}','ClassController@delete');

//student route
    Route::get('students','StudentController@index');
    Route::get('student/create','StudentController@create');
    Route::post('student/save','StudentController@save');
    Route::get('student/edit/{id}','StudentController@edit');
    Route::post('student/update/{id}','StudentController@update');
    Route::delete('student/delete/{id}','StudentController@delete');

    //resource route
    Route::resource('faculties','FacultyController');
});
