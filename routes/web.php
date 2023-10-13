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
    Route::get('/index', 'AdminController@index')->name('admin.index');
    Route::get('/users/index', 'UserController@index')->name('admin.users.index');
    Route::get('/users/create', 'AdminController@create')->name('admin.users.create');
    Route::get('/users/store', 'AdminController@store')->name('admin.users.store');
    Route::get('/users/edit', 'AdminController@edit')->name('admin.users.edit');
    Route::get('/users/delete', 'AdminController@delete')->name('admin.users.delete');
  });

  Route::group(['prefix' => 'product'], function () {
    Route::get('/index', 'productController@index')->name('admin.index');
    Route::get('/products/index', 'productController@index')->name('admin.products.index');
    Route::get('/products/create', 'productController@create')->name('admin.products.create');
    Route::get('/products/store', 'productController@store')->name('admin.products.store');
    Route::get('/products/edit', 'productController@edit')->name('admin.products.edit');
    Route::get('/products/delete', 'productController@delete')->name('admin.products.delete');
  });

});
});
