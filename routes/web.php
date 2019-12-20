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

  Route::get('/request', 'OrdersController@users');
  Route::post('/request', 'OrdersController@store');
  Route::get('/mybooks', 'OrdersController@index');
  Route::put('/mybooks/{order}', 'OrdersController@cancelOrders');


    Route::group(['middleware' => 'rol'], function () {
      Route::get('/orders', 'OrdersController@home')->name('orders');
      Route::put('/orders/{order}', 'OrdersController@changeStatus');

        Route::resources([
          'books' => 'BookController',
          'authors' => 'AuthorController',
          'genders' => 'GenderController'
      ]);
      Route::get('/registeradmin', 'Auth\RegisterAdminController@index');
      Route::post('/registeradmin', 'Auth\RegisterAdminController@register');
      Route::get('/books/{id}/inventory', 'BookController@getInventory')->name('books_inventory');
      Route::get('/list-order', 'ReportController@pdf');
      Route::get('down-order', 'ReportController@index');
    });
});

