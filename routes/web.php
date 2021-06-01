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
Route::group([ 'namespace' => 'App\Http\Controllers'], function() {
    Route::get('/', ['as' => '/', 'uses' => 'BookController@index']);
    Route::get('/book/{id}', 'BookController@book');
    Route::get('/series', 'SeriesController@series');
    Route::get('/series/{id}', 'SeriesController@series_one');

    Route::get('/category/{id}', 'CategoryController@category');

    Route::post('/cart/item', 'CartController@item');
    Route::post('/cart/add', 'CartController@add');
    Route::post('/cart/delete', 'CartController@delete');

    Route::post('/payment/show', 'PaymentController@show');
    Route::post('/payment/add', 'PaymentController@add');
    Route::post('/payment/status', 'PaymentController@status');

    Route::get('/search', 'SearchController@search');
});

Route::group(['middleware' => ['web'], 'namespace' => 'App\Http\Controllers\Auth'], function() {
    Route::get('login', ['as' => 'login', 'uses' => 'LoginController@showLoginForm']);
    Route::post('login', ['as' => 'login.post', 'uses' => 'LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'LoginCoApp\Http\ntroller@logout']);
});

Route::group(['prefix' => '/admin_panel', 'middleware' => 'admin', 'namespace' => 'Admin'],function () {

});
