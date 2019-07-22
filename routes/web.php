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

Auth::routes(['register' => false]);

Route::get('/', function () {
    return redirect()->route('products.type.index');
})->name('home');

Route::middleware('auth')
    ->group(function () {
        Route::namespace('Product')
            ->prefix('product')
            ->group(function () {
                Route::get('type', 'TypesController@index')->name('products.type.index');
                Route::get('type/create', 'TypesController@create')->name('products.type.create');
                Route::post('type', 'TypesController@store')->name('products.type.store');
                Route::get('type/{id}/edit', 'TypesController@edit')->name('products.type.edit');
                Route::put('type/{id}', 'TypesController@update')->name('products.type.update');
                Route::delete('type/{id}', 'TypesController@destroy')->name('products.type.destroy');

                Route::get('product/{type}', 'ProductsController@index')->name('products.product.index');
                Route::get('product/{type}/create', 'ProductsController@create')->name('products.product.create');
                Route::post('product/{type}', 'ProductsController@store')->name('products.product.store');
                Route::get('product/{type}/{product}/edit', 'ProductsController@edit')->name('products.product.edit');
                Route::put('product/{type}/{product}', 'ProductsController@update')->name('products.product.update');
                Route::delete('product/{type}/{product}', 'ProductsController@destroy')->name('products.product.destroy');
            });

        Route::middleware('auth.admin')
            ->prefix('admin')
            ->group(function () {
                
            Route::namespace('Audit')
                ->prefix('audit')
                ->group(function () {
                    Route::get('/', 'LogsController@index')->name('audit.logs.index');
                });
            });
    });
