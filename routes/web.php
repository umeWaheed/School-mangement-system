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

Route::get('/admin', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');

Route::group(['middleware' => 'is_admin', 'prefix' => 'admin'], function () {
    Route::resource('subjects', 'SubjectsController');
    Route::resource('sections', 'SectionsController');
	Route::resource('teachers', 'TeachersController');
	Route::resource('classes', 'ClassesController');
	Route::resource('students','StudentsController');
});
