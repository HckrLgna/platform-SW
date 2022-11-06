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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth'],'as' => 'backoffice.'],function (){
    Route::get('admin','App\Http\Controllers\AdminController@show')
        ->name('admin.show');
    Route::resource('user','App\Http\Controllers\UserController');
    Route::resource('role','App\Http\Controllers\RoleController');
    Route::get('user/{user}/assign_role','App\Http\Controllers\UserController@assign_role')
        ->name('user.assign_role');
    Route::post('user/{user}/role_assignment','App\Http\Controllers\UserController@role_assignment')
        ->name('user.role_assignment');

    Route::resource('permission','App\Http\Controllers\PermissionController');
    Route::get('user/{user}/assign_permission','App\Http\Controllers\UserController@assign_permission')
        ->name('user.assign_permission');
    Route::post('user/{user}/permission_assignment','App\Http\Controllers\UserController@permission_assignment')
        ->name('user.permission_assignment');
});

Route::get('test',function (){
    return view('theme.frontoffice.pages.board.index');
});
