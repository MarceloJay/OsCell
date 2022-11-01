<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;;

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
// Redirect Home to Edit Order ;
Route::post('/edit-order', 'OrderController@editOrder')->name('editOrder');
// Save Order ;
Route::post('/save-order', 'OrderController@saveOrder')->name('saveOrder');
// Order Success ;
Route::get('/order-success', 'OrderController@orderSuccess')->name('orderSuccess');
// Register Users ;
Route::get('/registration/{id}', 'ClientController@registration')->name('registration');
// Cliente Save ;
Route::post('/clientSave', 'ClientController@clientSave')->name('clientSave');
// Search Client ;
Route::get('searchClient/{name}', 'ClientController@searchClient')->name('searchClient');
// Save Serviccess ;
Route::post('/saveService', 'OrderController@saveService')->name('saveService');
