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
//frontend
Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/trang-chu', [\App\Http\Controllers\HomeController::class, 'index']);

//backend
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index']);
Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'show_dashboard']);
Route::get('/logout', [\App\Http\Controllers\AdminController::class, 'logout']);
Route::post('/admin-dashboard',[\App\Http\Controllers\AdminController::class,'dashboard']);

//category-product
Route::get('/add-category-product', [\App\Http\Controllers\CategoryProduct::class,'add_category_product']);
Route::get('/all-category-product', [\App\Http\Controllers\CategoryProduct::class, 'all_category_product']);
Route::get('/edit-category-product/{category_product_id}', [\App\Http\Controllers\CategoryProduct::class, 'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}', [\App\Http\Controllers\CategoryProduct::class, 'delete_category_product']);

Route::get('/show-category-product/{category_product_id}', [\App\Http\Controllers\CategoryProduct::class, 'show_category_product']);
Route::get('/hide-category-product/{category_product_id}', [\App\Http\Controllers\CategoryProduct::class, 'hide_category_product']);


Route::post('/save-category-product', [\App\Http\Controllers\CategoryProduct::class, 'save_category_product']);
Route::post('/update-category-product/{category_product_id}', [\App\Http\Controllers\CategoryProduct::class, 'update_category_product']);
