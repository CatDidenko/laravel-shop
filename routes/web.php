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
Route::group(['prefix' => config('backpack.base.route_prefix', 'admin')], function () {
    CRUD::resource('product', 'Admin\ProductCrudController');
    CRUD::resource('category', 'Admin\CategoryCrudController');
    CRUD::resource('order', 'Admin\OrderCrudController');
});

Auth::routes();

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/products/{slug}', 'ProductController@getProduct');
Route::post('/search', 'ProductController@search');

Route::get('/category/{slug}', 'CategoryController@getCategoryProducts')->name('category');
Route::post('/category/{slug}', 'CategoryController@getCategoryProducts');

Route::middleware(['permission:cart'])->group(function () {
    Route::resource('cart', 'CartController');
    Route::delete('emptyCart', 'CartController@emptyCart');
    Route::get('/checkout', 'CartController@submitCheckout')->name('checkout');
    Route::post('switchToWishlist/{id}', 'CartController@switchToWishlist');
});

Route::middleware(['permission:profile'])->group(function () {
    Route::get('/profile', 'UserProfileController@getProfile')->name('profile');
});
