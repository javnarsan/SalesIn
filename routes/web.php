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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin','AdminController@index')->name('admin');
Route::get('/admin/adminActivate','AdminController@activateUsers')->name('adminActivate');
Route::get('/admin/adminActivate/{id}/adminActivated','AdminController@activate')->name('adminActivated');
Route::get('/admin/adminDelete','AdminController@deleteUsers')->name('adminDelete');
Route::get('/admin/adminUpdate','AdminController@showUsers')->name('adminUpdate');
Route::get('/admin/adminUpdate/{user}/adminEdit','AdminController@edit')->name('adminEdit');
