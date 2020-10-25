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
Route::get('customers', 'CustomerController@index');
Route::get('customers/{customer}', 'CustomerController@show');
Route::get('customers/{id}/transactions', 'CustomerController@showCustomerTransactions');
Route::get('transactions', 'TransactionController@index');
Route::get('transactions/{transaction}', 'TransactionController@show');
/*
Route::get('{any}', function () {
    return view('welcome');
})->where('any', '.*');
*/
