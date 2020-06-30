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

//Se definen las rutas a utilizar

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/lock_user/{id}', 'HomeController@unlock_user');
Route::get('/lists', 'HomeController@lists');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
