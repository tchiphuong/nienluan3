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
Route::get('/gio-hang', [\App\Http\Controllers\HomeController::class, 'cart']);
Route::POST('/tim-kiem', [\App\Http\Controllers\HomeController::class, 'search']);


//Danh muc san pham trang chu
Route::get('/danh-muc/{category_id}',[\App\Http\Controllers\CategoryProduct::class,'show_category_home']);
Route::get('/thuong-hieu/{brand_id}',[\App\Http\Controllers\BrandProduct::class,'show_brand_home']);
Route::get('/san-pham/{product_id}',[\App\Http\Controllers\ProductController::class,'details_product']);
Route::get('/san-pham',[\App\Http\Controllers\ProductController::class,'show_product_home']);

//backend
Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'index']);
Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'show_dashboard']);
Route::get('/logout', [\App\Http\Controllers\AdminController::class, 'logout']);
Route::post('/admin-dashboard',[\App\Http\Controllers\AdminController::class,'dashboard']);


//admin
Route::get('/insert-admin', [\App\Http\Controllers\AdminController::class, 'add_admin']);
Route::get('/view-admin', [\App\Http\Controllers\AdminController::class, 'all_admin']);
Route::get('/edit-admin/{admin_id}', [\App\Http\Controllers\AdminController::class, 'edit_admin']);
Route::get('/delete-admin/{admin_id}', [\App\Http\Controllers\AdminController::class, 'delete_admin']);
Route::post('/save-admin', [\App\Http\Controllers\AdminController::class, 'save_admin']);
Route::post('/update-admin/{admin_id}', [\App\Http\Controllers\AdminController::class, 'update_admin']);

//category-product
Route::get('/add-category-product', [\App\Http\Controllers\CategoryProduct::class,'add_category_product']);
Route::get('/all-category-product', [\App\Http\Controllers\CategoryProduct::class, 'all_category_product']);
Route::get('/edit-category-product/{category_product_id}', [\App\Http\Controllers\CategoryProduct::class, 'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}', [\App\Http\Controllers\CategoryProduct::class, 'delete_category_product']);
Route::get('/show-category-product/{category_product_id}', [\App\Http\Controllers\CategoryProduct::class, 'show_category_product']);
Route::get('/hide-category-product/{category_product_id}', [\App\Http\Controllers\CategoryProduct::class, 'hide_category_product']);
Route::post('/save-category-product', [\App\Http\Controllers\CategoryProduct::class, 'save_category_product']);
Route::post('/update-category-product/{category_product_id}', [\App\Http\Controllers\CategoryProduct::class, 'update_category_product']);


//brand-product
Route::get('/add-brand-product', [\App\Http\Controllers\BrandProduct::class,'add_brand_product']);
Route::get('/all-brand-product', [\App\Http\Controllers\BrandProduct::class, 'all_brand_product']);
Route::get('/edit-brand-product/{brand_product_id}', [\App\Http\Controllers\BrandProduct::class, 'edit_brand_product']);
Route::get('/delete-brand-product/{brand_product_id}', [\App\Http\Controllers\BrandProduct::class, 'delete_brand_product']);
Route::get('/show-brand-product/{brand_product_id}', [\App\Http\Controllers\BrandProduct::class, 'show_brand_product']);
Route::get('/hide-brand-product/{brand_product_id}', [\App\Http\Controllers\BrandProduct::class, 'hide_brand_product']);
Route::post('/save-brand-product', [\App\Http\Controllers\BrandProduct::class, 'save_brand_product']);
Route::post('/update-brand-product/{brand_product_id}', [\App\Http\Controllers\BrandProduct::class, 'update_brand_product']);

//product
Route::get('/add-product', [\App\Http\Controllers\ProductController::class,'add_product']);
Route::get('/all-product', [\App\Http\Controllers\ProductController::class, 'all_product']);
Route::get('/edit-product/{product_id}', [\App\Http\Controllers\ProductController::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [\App\Http\Controllers\ProductController::class, 'delete_product']);
Route::get('/show-product/{product_id}', [\App\Http\Controllers\ProductController::class, 'show_product']);
Route::get('/hide-product/{product_id}', [\App\Http\Controllers\ProductController::class, 'hide_product']);
Route::post('/save-product', [\App\Http\Controllers\ProductController::class, 'save_product']);
Route::post('/update-product/{product_id}', [\App\Http\Controllers\ProductController::class, 'update_product']);

//cart
Route::get('/save-cart/{id}', [\App\Http\Controllers\CartController::class, 'add_cart_home']);
Route::POST('/save-cart', [\App\Http\Controllers\CartController::class, 'save_cart']);
Route::POST('/update-cart-quantity', [\App\Http\Controllers\CartController::class, 'update_cart_quantity']);
Route::get('/show-cart', [\App\Http\Controllers\CartController::class, 'show_cart']);
Route::get('/delete-to-cart/{rowId}', [\App\Http\Controllers\CartController::class, 'delete_to_cart']);
Route::get('/update-to-cart/{qty}/{rowId}', [\App\Http\Controllers\CartController::class, 'update_to_cart']);


//checkout
Route::get('/dang-nhap', [\App\Http\Controllers\CheckoutController::class, 'login_checkout']);
Route::get('/logout-checkout', [\App\Http\Controllers\CheckoutController::class, 'logout_checkout']);
Route::get('/dang-ky', [\App\Http\Controllers\CheckoutController::class, 'sign_up']);
Route::post('/add-customer', [\App\Http\Controllers\CheckoutController::class, 'add_customer']);
Route::post('/login-customer', [\App\Http\Controllers\CheckoutController::class, 'login_customer']);
Route::post('/save-checkout-customer', [\App\Http\Controllers\CheckoutController::class, 'save_checkout_customer']);
Route::get('/checkout', [\App\Http\Controllers\CheckoutController::class, 'checkout']);
Route::get('/payment', [\App\Http\Controllers\CheckoutController::class, 'payment']);
Route::get('/order-place', [\App\Http\Controllers\CheckoutController::class, 'order_place']);

//order
Route::get('/view-order', [\App\Http\Controllers\CheckoutController::class, 'manage_order']);
Route::get('/edit-order/{id}', [\App\Http\Controllers\CheckoutController::class, 'approval_order']);
Route::get('/shipping-order/{id}', [\App\Http\Controllers\CheckoutController::class, 'shipping_order']);
Route::get('/delete-order/{id}', [\App\Http\Controllers\CheckoutController::class, 'delete_order']);
Route::get('/view-order-checked', [\App\Http\Controllers\CheckoutController::class, 'manage_order_checked']);
Route::get('/view-order-details/{id}', [\App\Http\Controllers\CheckoutController::class, 'view_order_details']);



//customer
Route::get('/view-customer', [\App\Http\Controllers\CustomerController::class, 'all_customer']);


//excel
Route::get('export-product',  [\App\Http\Controllers\ExportController::class, 'print_excel']);
//endexxcel

//pdf
Route::get('export-pdf',  [\App\Http\Controllers\ExportController::class, 'print_pdf']);
Route::get('export-order{id}',  [\App\Http\Controllers\ExportController::class, 'print_order']);
//endpdf


//addproduct random
Route::get('/random-product', [\App\Http\Controllers\ProductController::class, 'pro_random']);
