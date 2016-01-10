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

    Route::get('files/{folder?}', 'FilesController@index');
    Route::get('files/upload/{folder}', 'FilesController@upload');
    Route::post('files/upload/{folder}', 'FilesController@uploadPost');
    Route::get('files/folder/new/{folder}', 'FilesController@newFolder');
    Route::post('files/folder/new/{folder}', 'FilesController@createFolder');
    Route::delete('files/folder/delete/{folder}', 'FilesController@folderDelete');

    Route::get('profile', 'ProfileController@index');
    Route::patch('profile/update', 'ProfileController@update');
    Route::get('profile/numbers', 'ProfileController@numbers');
    Route::post('profile/number', 'ProfileController@numberCreate');
    Route::delete('profile/number/{number}', 'ProfileController@numberDelete');
    Route::patch('profile/number/{number}', 'ProfileController@numberUpdate');
    Route::get('profile/number/{number}', 'ProfileController@numberEdit');

    Route::get('dashboard', 'DashboardController@index');
    Route::get('dashboard/users', 'DashboardController@users');
    Route::delete('dashboard/user/{user}', 'DashboardController@userDelete');
    Route::get('dashboard/user/new', 'DashboardController@userNew');
    Route::post('dashboard/user/create', 'DashboardController@userCreate');
    Route::get('dashboard/user/edit/{user}', 'DashboardController@userEdit');
    Route::patch('dashboard/user/update/{user}', 'DashboardController@userUpdate');
});
