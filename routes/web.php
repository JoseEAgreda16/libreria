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

    Route::get('/orders', 'HomeController@home')->name('home');

    Route::group(['middleware' => 'rol'], function () {

        Route::get('/books', 'BookController@index');
        Route::get('/book/add', 'BookController@AddBooksView');
        Route::post('/book/add', 'BookController@AddBooks');
        Route::post('/book/update/{title}','BookController@UpdateBooks');
        Route::post('/book/delete/{title}/{id_author}', 'BookController@DeleteBooks');

        Route::get('/authors', 'AuthorController@index');
        Route::post('/author/add', 'AuthorController@add');
        Route::post('/author/update/{name}', 'AuthorController@update');
        Route::post('/author/delete/{name}', 'AuthorController@delete');

        Route::get('/gender', 'GenderController@index');
        Route::post('/gender/add', 'GenderController@add');
        Route::post('/gender/update/{name}', 'GenderController@update');
        Route::post('/gender/delete/{name}', 'GenderController@delete');


        Route::get('/registeradmin', 'Auth\RegisterAdminController@index');
        Route::post('/registeradmin', 'Auth\RegisterAdminController@register');
    });
});

