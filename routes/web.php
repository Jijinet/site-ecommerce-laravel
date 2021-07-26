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


Route::get('/category_products/{id_category}', 'ProductController@listCategoryProducts');
Route::get('/products/asc', 'ProductController@listProductsAsc');
Route::get('/products/desc', 'ProductController@listProductsDesc');
Route::get('/products/search', 'ProductController@listSearchedProducts');
Route::get('/', 'ProductController@listProducts');

Route::post('/client/add', 'ClientController@addClient');
Route::post('/client/auth', 'ClientController@authClient');
