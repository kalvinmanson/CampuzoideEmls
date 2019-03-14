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


Route::get('/', 'CourseController@index')->name('home');
Route::get('/install', 'WebController@install')->name('install');
Auth::routes();

// Aula
Route::resource('users', 'UserController');
Route::resource('courses', 'CourseController');
Route::resource('courses.sections', 'CourseSectionController');
Route::resource('courses.enrollments', 'CourseEnrollmentController')->except(['create', 'edit']);
Route::resource('courses.topics', 'CourseTopicController');
