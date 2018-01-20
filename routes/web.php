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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['prefix' => config('backpack.base.route_prefix', 'admin'), 'middleware' => ['admin']], function () {
    CRUD::resource('product', 'Admin\ProductCrudController');
    CRUD::resource('category', 'Admin\CategoryCrudController');
    CRUD::resource('order', 'Admin\OrderCrudController');
});

Auth::routes();

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
Route::get('/products/{slug}', 'ProductController@getProduct');
Route::get('/category/{slug}', 'CategoryController@getCategoryProducts');
Route::post('/category/{slug}', 'CategoryController@getCategoryProducts');
