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

Route::get('permission/is-admin', 'PermissionController@isAdmin')->name('permission.admin');
Route::resource('departments', 'DepartmentController');
Route::resource('staff', 'StaffController');
