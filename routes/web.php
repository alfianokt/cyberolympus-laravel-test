<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
Route::get('user', 'UserController@index')->name('user');
Route::get('product', 'ProductController@index')->name('product');
Route::get('order', 'OrderController@index')->name('order');
Route::get('laporan', 'LaporanController@index')->name('laporan');
Route::get('laporan/2', 'LaporanController@laporan2')->name('laporan.2');
Route::get('laporan/3', 'LaporanController@laporan3')->name('laporan.3');
