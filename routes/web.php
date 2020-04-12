<?php
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
 
Auth::routes();
 
/*
|--------------------------------------------------------------------------
| 1) User 
|--------------------------------------------------------------------------
*/
Route::get('/regisnter', 'PagesController@cart')->name('pages.cart');
Route::get('/home', 'PagesController@index')->name('pages.home');
Route::get('/shop', 'PagesController@shop')->name('pages.shop');
Route::get('/cart', 'PagesController@cart')->name('pages.cart');

Route::get('/select_product_by_category/{category_name}', 'PagesController@select_product_by_category');
Route::get('/addToCart/{id}', 'PagesController@addToCart');
Route::get('/removeItem/{product_id}', 'PagesController@removeItem')->name('pages.cart');
Route::post('/update_Qty', 'PagesController@update_Qty')->name('pages.cart');

/*
|--------------------------------------------------------------------------
| 2) User After Login
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/', 'PagesController@index')->name('pages.home');
});

Route::get('/checkout', 'ProductController@checkout')->name('pages.checkout');
Route::post('/postCheckout', 'ProductController@postCheckout');

/*
|--------------------------------------------------------------------------
| 3) Admin 
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function() {
    Route::get('/',         function () { return redirect('/admin/home'); });
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');
});
/*
|--------------------------------------------------------------------------
| 4) Admin After Login
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
    Route::get('/admin/home',      'Admin\AdminController@index')->name('admin.home');
});

Route::get('admin/home', 'Admin\AdminController@index')->name('admin.home');

/* -------------------------   Category  ------------------------- */
Route::get('/add_category', 'Admin\AdminController@add_category')->name('admin.add_category');
Route::post('/add_category', 'CategoryController@save_category')->name('admin.add_category');
Route::get('/edit_category/{id}', 'Admin\AdminController@edit_category');
Route::post('/update_category', 'CategoryController@update_category');
Route::get('/delete_category/{id}', 'CategoryController@delete_category');
Route::get('/categories', 'Admin\AdminController@categories')->name('admin.all_categories');
Route::get('/edit_categories', 'CategoryController@edit_category')->name('admin.edit_category');

/* -------------------------   Product  ------------------------- */
Route::get('/add_product', 'Admin\AdminController@add_product')->name('admin.add_product');
Route::post('/add_product', 'Admin\ProductController@save_product')->name('admin.add_product');
Route::get('/edit_product/{id}', 'Admin\AdminController@edit_product');
Route::post('/update_product', 'Admin\ProductController@update_product');
Route::get('/unactivate_product/{id}', 'Admin\ProductController@unactivate_product');
Route::get('/activate_product/{id}', 'Admin\ProductController@activate_product');
Route::get('/delete_product/{id}', 'Admin\ProductController@delete_product');
Route::get('/products', 'Admin\AdminController@products')->name('admin.all_products');

/* -------------------------   Slider  -------------------------*/
Route::get('/add_slider', 'Admin\AdminController@add_slider')->name('admin.add_slider');
Route::post('/add_slider', 'SliderController@save_slider')->name('admin.add_slider');
Route::get('/edit_slider/{id}', 'Admin\AdminController@edit_slider');
Route::post('/update_slider', 'SliderController@update_slider');
Route::get('/unactivate_slider/{id}', 'SliderController@unactivate_slider');
Route::get('/activate_slider/{id}', 'SliderController@activate_slider');
Route::get('/delete_slider/{id}', 'SliderController@delete_slider');
Route::get('/sliders', 'Admin\AdminController@sliders')->name('admin.all_sliders');
 
/* -------------------------   Orders  -------------------------*/
Route::get('/orders', 'Admin\AdminController@orders')->name('admin.all_orders');
Route::get('/view_pdf/{id}', 'PdfController@view_pdf');