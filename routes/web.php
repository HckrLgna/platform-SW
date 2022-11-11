<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes(['verify' => true]);

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


Route::group(['middleware' => ['auth'],'as' => 'frontoffice.'],function (){
    Route::get('dashboard',[App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('board','App\Http\Controllers\BoardController');
    Route::get('add-user-board/{role_id?}/{board_id?}/send','App\Http\Controllers\BoardController@addUserBoard')->name('board.add-user');
    Route::post('send-invitation/{board}/','App\Http\Controllers\SendInvitationController@enviar')->name('send-invitation');

});

Route::get('auth/user', function () {

    if(auth()->check()){

        return response()->json([
            'authUser' => auth()->user()
        ]);

        return null;

    }

});

Route::get('chat/{chat}', 'App\Http\Controllers\ChatController@show')->name('chat.show');

Route::get('chat/with/{user}', 'App\Http\Controllers\ChatController@chat_with')->name('chat.with');

Route::get('chat/{chat}/get_users', 'App\Http\Controllers\ChatController@get_users')->name('chat.get_users');

Route::get('chat/{chat}/get_messages', 'App\Http\Controllers\ChatController@get_messages')->name('chat.get_messages');

Route::post('message/sent', '\App\Http\Controllers\MessageController@sent')->name('message.sent');

