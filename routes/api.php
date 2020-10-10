<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
//print_r("expression");die;
Route::group([
    'prefix' => 'auth'
], function () {

    Route::post('login', [AuthController::class,'login']);
    Route::post('signup', [UserController::class,'signup']);
  	Route::post('register', [UserController::class, 'register']);
    Route::group([
      'middleware' => 'auth:api'
    ], function() {
		Route::post('details', [UserController::class,'details']);
		Route::post('edit/{id}', [UserController::class,'edit']);
		Route::delete('destory/{id}', [UserController::class,'destory']);
        Route::get('logout', [UserController::class,'logout']);
        Route::get('user', [UserController::class,'user']);
    });
});