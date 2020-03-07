<?php

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


Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::resource('colour', 'ColourController')->middleware(['permission:master']);
    Route::resource('type', 'TypeController')->middleware(['permission:master']);
    Route::resource('size', 'SizeController')->middleware(['permission:master']);
    Route::resource('product', 'ProductController')->middleware(['permission:product']);
    Route::resource('warehouse', 'WarehouseController')->middleware(['permission:warehouse']);
    Route::resource('permission', 'PermissionController')->middleware(['permission:master']);
    Route::resource('role', 'RoleController')->middleware(['permission:master']);
    Route::resource('user', 'UserController')->middleware(['permission:user']);
});
