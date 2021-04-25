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
    return view('app');
});


Route::post('/todo/list', "\App\Http\Controllers\TodoController@all");
Route::post('/todo/create', "\App\Http\Controllers\TodoController@create");
Route::post('/todo/finish/{id}', "\App\Http\Controllers\TodoController@finish");
Route::post('/todo/clear_finish', "\App\Http\Controllers\TodoController@clearFinish");
