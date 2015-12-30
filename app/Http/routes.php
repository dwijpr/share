<?php

use ShareApp\Task;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function(){
    Route::get('/', function(){
        return view('welcome');
    })->middleware('guest');

    Route::auth();

    Route::get('home', 'HomeController@index');

    Route::get('dashboard', 'DashboardController@index');
    Route::get('dashboard/users', 'DashboardController@users');
    Route::delete('dashboard/user/{user}', 'DashboardController@userDelete');
    Route::get('dashboard/user/new', 'DashboardController@userNew');
    Route::post('dashboard/user/create', 'DashboardController@userCreate');
    Route::get('dashboard/user/edit/{user}', 'DashboardController@userEdit');
    Route::patch('dashboard/user/update/{user}', 'DashboardController@userUpdate');
});
