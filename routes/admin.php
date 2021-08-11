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


Route::resource('users', 'Admin\UserController')->names('admin.users');
Route::resource('roles', 'Admin\RoleController')->names('admin.roles');
Route::get('permissions', 'Admin\PermissionController@index')->name('admin.permissions.index');
