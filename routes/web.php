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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create-order', 'OrderController@createOrder')->name('createOrder');

Route::get('/edit-order', 'OrderController@editOrder')->name('editOrder');

Route::get('/registration/{id}', 'ClientController@registration')->name('registration');
// Cliente Save ;
Route::post('/clientSave', 'ClientController@clientSave')->name('clientSave');
