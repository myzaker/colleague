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

Route::resource('logs', 'Api\AccessLogController');

Route::resource('departments.groups', 'Api\DepartmentGroupController');
Route::resource('departments', 'Api\DepartmentController');

Route::get('staff/search', 'Api\StaffController@search')->name('staff.search');
Route::resource('staff', 'Api\StaffController');
