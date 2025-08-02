<?php

use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Courses;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

Route::group(['namespace' => 'App\Http\Controllers'], function(){
    Route::get('/','HomeController@index')->name('home');
    Route::group(['middleware' => ['guest']], function() {
        Route::post('/login','Auth\RegisterController@login')->name('login');
        Route::get('/register','Auth\RegisterController@register_page')->name('register.page');
        Route::post('/register','Auth\RegisterController@register_submit')->name('register.submit');
    });
    Route::group(['middleware' => ['auth','checkstatus']], function() {
        Route::post('/logout','Auth\RegisterController@logout')->name('logout');
        Route::get('/dashboard','DashboardController@index')->name('dashboard');
        Route::get('/products','ProductsController@index')->name('products.index');
        Route::get('/orders','OrdersController@index')->name('orders.index');
        Route::get('/orders/{id}/view','OrdersController@view')->name('orders.view');
        Route::group(['middleware' => ['Admin']], function(){
            Route::get('/products/add','ProductsController@add')->name('products.add');
            Route::post('/products/add','ProductsController@add_submit')->name('products.submit');
            Route::get('/products/{id}/edit','ProductsController@edit')->name('products.edit');
            Route::post('/products/{id}/edit','ProductsController@edit_submit')->name('products.edit.submit');
            Route::post('/products/delete','ProductsController@delete_submit')->name('products.delete.submit');
            Route::get('/customers','UsersController@index')->name('customers.index');
            Route::get('/customers/add','UsersController@add')->name('customers.add');
            Route::post('/customers/add','UsersController@add_submit')->name('customers.submit');
            Route::get('/customers/{id}/edit','UsersController@edit')->name('customers.edit');
            Route::post('/customers/{id}/edit','UsersController@edit_submit')->name('customers.edit.submit');
            Route::post('/customers/delete','UsersController@delete_submit')->name('customers.delete.submit');
            Route::post('/customers/active','UsersController@active_submit')->name('customers.active.submit');
            Route::post('/orders/status/submit','OrdersController@status_submit')->name('orders.status.submit');
            // Route::get('/dashboard/users','UsersController@index')->name('users.list');
            // Route::get('/dashboard/users/{id}','UsersController@detail')->name('users.detail');
            // Route::get('/dashboard/users/{id}/active','UsersController@active')->name('users.active');
            // Route::get('/dashboard/users/{id}/show','UsersController@show')->name('users.show');
            // Route::post('/dashboard/users/{id}/store','UsersController@store')->name('users.store');
        });
        Route::group(['middleware' => ['Customer']], function(){
            Route::get('/customer','DashboardController@index')->name('customer');
            Route::get('/profile','HomeController@profile')->name('profile.index');
            Route::post('/profile','HomeController@profile_submit')->name('profile.submit');
            Route::get('/products/{id}/view','ProductsController@view')->name('products.view');
            Route::post('/products/view','ProductsController@view_submit')->name('products.view.submit');
            Route::get('/products/view/card','ProductsController@view_card')->name('products.view.card');
            Route::post('/products/view/card','ProductsController@view_card_submit')->name('products.view.card.submit');
        });
    });
});