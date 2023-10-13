<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'user'], function () {
    Route::group(['namespace' => 'App\\Http\\Controllers\\Api'], function () {
    Route::post('register', 'UserRegisterController');
    Route::post('verify', 'UserVerifyController');
    Route::post('login', 'UserLoginController');
    Route::post('forgetUserPassword', 'UpdateUserInformationController@forgetUserPassword');
    Route::post('updateUserPassword', 'UpdateUserInformationController@updateUserPassword');

    Route::group(['middleware' => 'auth:sanctum'], function() {
      Route::get('logout', [AuthController::class]);
      Route::get('getUserInfo', 'GetUserInfoController');
      Route::post('UpdateUserInfo', 'UpdateUserInformationController@UpdateUserInfo');
      Route::post('ChangeUserPassword', 'UpdateUserInformationController@ChangeUserPassword');
      Route::get('products', 'GetUserProductsController');
    });
});
});

Route::group(['prefix' => 'product'], function () {
    Route::group(['namespace' => 'App\\Http\\Controllers\\Api'], function () {
        Route::post('store', 'ProductController@store');
        Route::post('update/{id}', 'ProductController@update');
        Route::delete('delete/{id}', 'ProductController@delete');
        Route::get('getAll', 'ProductController@getAll');
        Route::post('AssignProductsToUser', 'ProductController@AssignProductsToUser');
    });
});

