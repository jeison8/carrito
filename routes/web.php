<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {return view('welcome');});
Route::get('/','StoreController@index')->name('store.index');
Route::get('all-Categories','StoreController@allCategories')->name('store.allCategories');
Route::get('add-cart/{product}','StoreController@addCart')->name('store.add-cart');
Route::get('product-detail/{product}','StoreController@detail')->name('store.detail');
Route::get('cart', function () {return view('cart');});
Route::get('order','StoreController@order')->name('store.order');
Route::get('shipping-info','StoreController@shippingInfo')->name('store.shipping-info');
Route::patch('insert-shipping-info/{user}','PasarellaController@InsertshippingInfo')->name('pasarella.insert-shipping-info');
Route::get('shipping-response','PasarellaController@ShippingResponse')->name('pasarella.shipping-response');
Route::get('list-products','ProductController@index')->name('products.index');
Route::get('create-products','ProductController@create')->name('products.create');
Route::post('store-products','ProductController@store')->name('products.store');
Route::get('edit-products/{product}','ProductController@edit')->name('products.edit');
Route::get('destroy-products/{product}','ProductController@destroy')->name('products.destroy');
Route::patch('update-products/{product}','ProductController@update')->name('products.update');
Route::get('findCities','StoreController@findCities')->name('store.findCities');
Route::get('orders-history/{user}','OrderController@index')->name('history.index');
Route::post('store-search','StoreController@search')->name('store.search');
Route::get('re-order/{order}','OrderController@reOrder')->name('history.reOrder');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
