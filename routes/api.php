<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('auth/user', 'Api\AuthController@user')->name('auth.user');
Route::get('search', 'Api\SearchController@search')->name('search');

Route::resource('logs', 'Api\AccessLogController');

Route::resource('departments.groups', 'Api\DepartmentGroupController');
Route::put('departments/sort','Api\DepartmentController@updateSort')->name('departments.sort');
Route::resource('departments', 'Api\DepartmentController');

Route::resource('staff', 'Api\StaffController');
