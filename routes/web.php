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
//Route::get('/add_product', 'App\Http\Controllers\AddProductController@index');
//Route::post('/add_product', 'App\Http\Controllers\AddProductController@add');

Route::get('/add_product={id}', 'App\Http\Controllers\AddProductController@index');
Route::post('/add_product={id}', 'App\Http\Controllers\AddProductController@addProduct');
