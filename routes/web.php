<?php

use Illuminate\Support\Facades\Route;


Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false
]);
Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');


Route::get('/', 'ProductController@index')->name('index');

Route::middleware(['auth'])->group(function () {
    Route::group([
        'namespace' => 'Person',
        'prefix' => 'person',
        'as' => 'person.'
    ], function () {
        Route::get('/order', 'OrderController@index')->name('order');
        Route::get('/order/{id}', 'OrderController@show')->name('order-show');
    });

    Route::group([
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'as' => 'admin.'
    ], function () {
        Route::middleware('admin')->group(function () {
            Route::get('/order', 'OrderController@index')->name('order');
            Route::get('/order/{id}', 'OrderController@show')->name('order-show');
            Route::resource('categories', 'CategoryController');
            Route::resource('products', 'ProductController');
        });
    });
});

Route::group(['prefix' => 'basket'], function () {
    Route::post('/add/{id}', 'BasketController@basketAdd')->name('basket-add');

    Route::middleware('basket_not_empty')->group(function () {
        Route::get('/', 'BasketController@basket')->name('basket');
        Route::post('/remove/{id}', 'BasketController@basketRemove')->name('basket-remove');

        Route::middleware('auth')->group(function () {
            Route::get('/place', 'BasketController@basketPlace')->name('basket-place');
            Route::post('/place/{orderId}', 'BasketController@basketConfirm')->name('basket-confirm');
        });
    });
});

Route::get('/categories', 'ProductController@categories')->name('categories');

Route::group(['prefix' => '{cat}'], function () {
    Route::get('/', 'ProductController@category')->name('category');
    Route::get('/{product}', 'ProductController@product')->name('product');
});
