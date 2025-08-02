<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace' => 'App\Http\Controllers'], function(){
    Route::post('/login','Auth\RegisterController@api_login')->name('api_login_final');
    Route::group(['middleware' => ['ApiAuth']], function(){
        Route::prefix('/customer/bill')->group(function () {
            Route::get('/products','Bill\ProductController@api_customer_bill_product');
        });
    });
});