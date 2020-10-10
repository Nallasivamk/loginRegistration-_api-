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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return redirect('login');
});
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/user', '\App\Http\Controllers\Admin\UserContoller@index');
    Route::get('/user/create', '\App\Http\Controllers\Admin\UserContoller@create');
    Route::post('/user/store', '\App\Http\Controllers\Admin\UserContoller@store');
	Route::get('/users/show/{id}', '\App\Http\Controllers\Admin\UserContoller@show');
    Route::get('/user/{id}/edit', '\App\Http\Controllers\Admin\UserContoller@edit');
	Route::PUT('/user/{id}', '\App\Http\Controllers\Admin\UserContoller@update');
	Route::get('/user/delete/{id}', '\App\Http\Controllers\Admin\UserContoller@destroy');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
   Route::get('/dashboard', 'App\Http\Controllers\Admin\UserContoller@dashboard')->name('dashboard');
   
});
Auth::routes();

//Route::get('/dashboard', 'App\Http\Controllers\Admin\UserContoller@dashboard')->name('dashboard');
