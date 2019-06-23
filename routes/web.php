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
    return view('dashboard');
});

Route::get('students/report', 'StudentController@report')->name('students.report');

Route::resource('teachers', 'TeacherController');
Route::resource('courses', 'CourseController');
Route::resource('students', 'StudentController');
