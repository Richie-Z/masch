<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/',function () {return view('welcome');});
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth','role:admin']],function(){
	Route::get('/admin/home','HomeController@admin')->name('admin.home');
	//branch
	Route::get('/admin/branch' , 'admin\BranchController@index')->name('admin.branch');
	Route::get('/admin/branch/add','admin\BranchController@add');
	Route::post('/admin/branch/store','admin\BranchController@store');
	Route::get('/admin/branch/edit/{id}','admin\BranchController@edit')->name('admin.branch.edit');
	Route::post('/admin/branch/update/{id}','admin\BranchController@update');
	Route::get('/admin/branch/delete/{id}','admin\BranchController@delete')->name('admin.branch.delete');
	//studio
	Route::get('/admin/studio','admin\StudioController@index')->name('admin.studio');
	Route::get('/admin/studio/add','admin\StudioController@add');
	Route::post('/admin/studio/store','admin\StudioController@store');
	Route::get('/admin/studio/edit/{id}','admin\StudioController@edit');
	Route::post('/admin/studio/update/{id}','admin\StudioController@update');
	Route::get('/admin/studio/delete/{id}','admin\StudioController@delete');
	//movie
	Route::get('/admin/movie','admin\MovieController@index')->name('admin.movie');
	Route::get('/admin/movie/add','admin\MovieController@add');
	Route::post('/admin/movie/store','admin\MovieController@store');
	Route::get('/admin/movie/edit/{id}','admin\MovieController@edit');
	Route::post('/admin/movie/update/{id}','admin\MovieController@update');
	Route::get('/admin/movie/delete/{id}','admin\MovieController@delete');
	//schedule
	Route::get('/admin/schedule','ScheduleController@index')->name('admin.schedule');
	Route::get('/admin/schedule/add','ScheduleController@add');
	Route::post('/admin/schedule/store','ScheduleController@store');
	Route::get('/admin/schedule/edit/{id}','ScheduleController@edit');
	Route::post('/admin/schedule/update/{id}','ScheduleController@update');
	Route::get('/admin/schedule/delete/{id}','ScheduleController@delete');
});
Route::group(['middleware'=>['auth','role:user']],function(){
	Route::get('/schedule','ScheduleController@user')->name('user.schedule');
	Route::get('/schedule/filter','ScheduleController@filter');
});