<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['namespace' => 'App\\Http\\Controllers\\Admin'], function () {
Route::get('admin/', 'AdminController@login')->name('admin.login');
Route::post('admin/handlelogin', 'AdminController@handleLogin')->name('admin.handlelogin');


Route::group(['middleware' => ['auth:admin']], function() {
    Route::group(['prefix' => 'user'], function () {
    Route::get('/index', 'UserController@index')->name('admin.users.index');
    Route::get('/create', 'UserController@create')->name('admin.users.create');
    Route::post('/store', 'UserController@store')->name('admin.users.store');
    Route::get('/show/{id}', 'UserController@show')->name('admin.users.show');
    Route::get('/edit/{id}', 'UserController@edit')->name('admin.users.edit');
    Route::post('/update/{id}', 'UserController@update')->name('admin.users.update');
    Route::delete('/delete/{id}', 'UserController@delete')->name('admin.users.delete');
    Route::get('/products/{id}', 'UserController@products')->name('admin.users.products');
  });
  Route::get('/index', 'productController@index')->name('admin.index');
  Route::group(['prefix' => 'product'], function () {
    Route::get('/index', 'productController@index')->name('admin.products.index');
    Route::get('/create', 'productController@create')->name('admin.products.create');
    Route::post('/store', 'productController@store')->name('admin.products.store');
    Route::get('/edit/{id}', 'productController@edit')->name('admin.products.edit');
    Route::post('/update/{id}', 'productController@update')->name('admin.products.update');
    Route::delete('/delete/{id}', 'productController@delete')->name('admin.products.delete');
  });

});
});
