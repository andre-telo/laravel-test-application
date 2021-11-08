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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin options route
//Route::get('/manage', 'ManageController@index');
Route::get('/manage', 'App\Http\Controllers\ManageController@index');


//Add products routes

Route::get('/add_product={id}', 'App\Http\Controllers\AddProductController@index');
Route::post('/add_product={id}', 'App\Http\Controllers\AddProductController@addProduct');

Route::get('/view_products={id}', 'App\Http\Controllers\ViewProductsController@index');


Route::get('/putonsell_product={id}', 'App\Http\Controllers\PutProductsOnSellController@index');
Route::post('/putonsell_product={id}', 'App\Http\Controllers\PutProductsOnSellController@putonsale');

Route::get('/view_products_on_sell', 'App\Http\Controllers\ViewProductsOnSellController@index');

Route::get('/purchase_product={id}', 'App\Http\Controllers\purchase_productController@index');
Route::post('/purchase_product={id}', 'App\Http\Controllers\purchase_productController@purchaseProduct');