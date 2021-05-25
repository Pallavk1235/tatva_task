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

Route::get('/Events','EventController@index')->name('event.index');
Route::post('/Events/store', 'EventController@store')->name('event.store');
Route::get('/view/event/{id}','EventController@show')->name('event.show');
Route::get('/delete/event/{id}','EventController@destroy')->name('event.destroy');
Route::get('/edit/event/{id}','EventController@edit')->name('event.edit');
Route::post('/update/event','EventController@update')->name('event.update');