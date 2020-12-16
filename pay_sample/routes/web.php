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


use App\Http\Controllers\ItemPurchaseController;

Route::get('/item', [ItemPurchaseController::class, "show"])->name("item");

Route::get('/item/buy', [ItemPurchaseController::class, "buy"])->name("confirm_payment");
Route::post('/item/buy', [ItemPurchaseController::class, "payment"])->name("do_payment");

Route::get('/item/complete', [ItemPurchaseController::class, "complete"])->name("finish_payment");