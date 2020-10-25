<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'api'], function () {
    Route::get('customers', 'CustomerController@index');
    Route::get('customers/{id}', 'CustomerController@show');
    Route::get('customers-transactions', 'TransactionController@index');
    Route::get('customers-transactions/{customer_id}', 'TransactionController@show');
//    Route::get('customers/edit/{id}', 'UserController@edit');
//    Route::post('customers/update/{id}', 'UserController@update');
//    Route::delete('customers/delete/{id}', 'CustomerController@delete');
});