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


Route::get('/', 'HomeController@index');
Auth::routes();


Route::group(['middleware' => 'auth'], function () {

  Route::get('/request', 'HomeController@users');

  Route::group(['middleware' => 'rol'], function () {
      Route::get('/orders', 'HomeController@home')->name('orders');
      Route::resources([
          'books' => 'BookController',
          'authors' => 'AuthorController',
          'genders' => 'GenderController'
      ]);
      Route::post('/request', 'RequestController@stroe');
      Route::get('/mybooks', 'OrdersController@index');

      Route::get('/registeradmin', 'Auth\RegisterAdminController@index');
      Route::post('/registeradmin', 'Auth\RegisterAdminController@register');
  });
});

