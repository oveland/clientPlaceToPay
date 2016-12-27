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

Route::get('/', 'MainController@index')->name('welcome');
Route::get('/payment', 'MainController@payment')->name('payment');
Route::post('/pay', 'MainController@pay')->name('pay');
Route::get('/transactions', 'MainController@transactionList')->name('transactions');
Route::get('/transaction/{reference}', 'MainController@transactionInformation')->name('transaction');
