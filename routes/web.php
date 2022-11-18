<?php

use App\Http\Controllers\AdminController;
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
    return view('auth.login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/adminMenu','AdminController@menu')->name('adminMenu');
Route::get('/adminViews/{id}/adminActivate','AdminController@activate')->name('adminActivate');
Route::get('/adminViews/{id}/adminDeactivate','AdminController@deactivate')->name('adminDeactivate');
Route::post('/articlesViews/articlesIndex/createArticle','ArticlesController@create')->name('createArticle');
Route::post('/articlesViews/articlesIndex/newCreateArticle','ArticlesController@store')->name('newCreateArticle');
Route::resource('adminViews','AdminController');
Route::resource('articlesViews', 'ArticlesController');

Route::get('/email/verify/{id}','Auth\LoginController@verifyEmail')->name('verification.verify');
