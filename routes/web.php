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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {



    /**Rotas protegidas */
    // Route::group(['middleware' => ['auth']], function () {

     

        /**Usuários */
        Route::get('users/team', 'UserController@team')->name('users.team');
        Route::resource('users', 'UserController');

        /**Veículos */
        Route::resource('vehicles', 'VehicleController');
      
    // });

  
});