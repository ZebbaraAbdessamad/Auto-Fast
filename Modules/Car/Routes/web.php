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

Route::prefix('car')->group(function() {
    
    Route::get('/', 'CarController@index')->name('car.index');
    Route::get('/create', 'CarController@create')->name('car.create')->middleware('permission:car_create');;;
    Route::post('/store', 'CarController@store')->name('car.store');
    Route::get('/edit/{id}', 'CarController@edit')->name('car.edit');
    Route::post('/delete', 'CarController@destroy')->name('car.delete');
    Route::get('/destroy_image/{id}', 'CarController@destroy_image')->name('car.destroy_image');


   Route::get('/attribute', 'AttributeController@index')->name('car.attribute');

 
});

Route::prefix('attribute')->group(function() {

    Route::get('/edit', 'AttributeController@edit')->name('attribute.edit');
    Route::post('/store', 'AttributeController@store')->name('attribute.store');
    Route::get('/create', 'AttributeController@create')->name('attribute.create');
    Route::post('/delete', 'AttributeController@destroy')->name('attribute.delete');
    
});


Route::prefix('terms')->group(function() {
    Route::get('/index/{id}', 'AttributeController@terms')->name('terms.index');
    Route::get('/edit/{id}/{idt}', 'AttributeController@edit_terms')->name('terms.edit');
    Route::post('/store', 'AttributeController@store_terms')->name('terms.store');
    Route::post('/delete', 'AttributeController@destroy_terms')->name('terms.delete');
    
});