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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('role')->name('home');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/user_dashboard', 'HomeController@dashboard')->name('user_dashboard');
Route::get('/add_category', 'CategoryController@create')->name('add_category')->middleware('role');
Route::post('/addcategory', 'CategoryController@store')->name('addCategory')->middleware('role');
Route::get('/category', 'CategoryController@index')->name('category_view')->middleware('role');
Route::get('/edit_category/{category}', 'CategoryController@edit')->name('edit_category')->middleware('role');
Route::post('/editCategory', 'CategoryController@update')->name('editCategory')->middleware('role');
Route::get('/delete/{category}', 'CategoryController@destroy')->name('deleteCategory')->middleware('role');

Route::get('/add_product/{category}', 'ProductController@create')->name('add_product')->middleware('role');
Route::get('/products', 'ProductController@index')->name('product');
Route::post('/add_product', 'ProductController@store')->name('addProduct')->middleware('role');