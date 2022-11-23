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
})->name('/');

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

    Route::get('user/{user}/assign_board','App\Http\Controllers\UserController@assign_board')
        ->name('user.assign_board');
    Route::post('user/{user}/board_assignment','App\Http\Controllers\UserController@board_assignment')
        ->name('user.board_assignment');
});


Route::group(['middleware' => ['auth'],'as' => 'frontoffice.'],function (){
    Route::get('dashboard',[App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('board','App\Http\Controllers\BoardController');

    Route::get('board/with/{user}', 'App\Http\Controllers\BoardController@board_with');
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

Route::get('dashboard/{chat}', 'App\Http\Controllers\DashboardController@show')->name('dashboard.show');

Route::get('dashboard/with/{user}', 'App\Http\Controllers\DashboardController@chat_with')->name('chat.with');

Route::get('dashboard/{chat}/get_users', 'App\Http\Controllers\DashboardController@get_users')->name('chat.get_users');

Route::get('dashboard/{chat}/get_messages', 'App\Http\Controllers\DashboardController@get_messages')->name('chat.get_messages');

Route::post('message/sent', '\App\Http\Controllers\MessageController@sent')->name('message.sent');


Route::get('board/with/{user}', 'App\Http\Controllers\BoardController@board_with')->name('board.with');
Route::post('model/sent', 'App\Http\Controllers\ModelController@sent')->name('model.sent');
Route::post('model/update/{id_model}', 'App\Http\Controllers\ModelController@myupdate')->name('model.myupdate');

Route::get('board/{board}/get_users', 'App\Http\Controllers\BoardController@get_users')->name('board.get_users');
Route::get('board/{board}/get_models', 'App\Http\Controllers\BoardController@get_models')->name('board.get_models');

