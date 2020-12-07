<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;

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
    return view('home');
});

Route::group(['prefix' => 'gallery', 'as'=>'gallery.'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'App\Http\Controllers\GalleryController@index']);
    Route::get('create', ['as' => 'create', 'uses' => 'App\Http\Controllers\GalleryController@create']);
    Route::post('store', ['as' => 'store', 'uses' => 'App\Http\Controllers\GalleryController@store']);
});
