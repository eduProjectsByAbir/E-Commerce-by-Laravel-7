<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', 'FontendController@index')->name('index');

Route::get('home', 'HomeController@index')->name('home');
Route::get('admin/home', 'AdminController@index')->name('dashboard')->middleware('auth:admin');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@Login');
Route::get('admin/logout','Admin\LoginController@logout')->name('admin.logout');

// ============================ Admin Route =========================

Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {

    // =========================== Category Routes ===========================
    Route::get('/categories','Admin\CategoryController@index')->name('category');
    Route::post('/categories/add','Admin\CategoryController@store')->name('add.category');
    Route::get('/categories/edit/{id}','Admin\CategoryController@edit')->name('edit.category');
    Route::put('/categories/update/{id}','Admin\CategoryController@update')->name('update.category');
    Route::get('/categories/delete/{id}','Admin\CategoryController@delete')->name('delete.category');

    // =========================== Brand Routes =======================
    Route::get('/brands','Admin\BrandController@index')->name('brand');
    Route::post('/brands/add','Admin\BrandController@store')->name('add.brand');
    Route::get('/brands/edit/{id}','Admin\BrandController@edit')->name('edit.brand');
    Route::put('/brand/update/{id}','Admin\BrandController@update')->name('update.brand');
    Route::get('/brand/delete/{id}','Admin\BrandController@destroy')->name('delete.brand');

    // =========================== Product Routes =================
    Route::get('/products/create','Admin\ProductController@create')->name('create.product');
    Route::post('/products/add','Admin\ProductController@store')->name('add.product');
    Route::get('/products/view','Admin\ProductController@index')->name('view.product');
    Route::get('/products/edit/{id}','Admin\ProductController@edit')->name('edit.product');
    Route::put('/products/update/{id}','Admin\ProductController@update')->name('update.product');

    Route::get('/products/delete/{id}','Admin\ProductController@destroy')->name('delete.product');

    // ======================== Coupon Routes ===================
    Route::get('/coupons','Admin\CouponController@index')->name('coupons');
    Route::post('/coupons/add','Admin\CouponController@store')->name('add.coupons');
    Route::get('/coupons/edit/{id}','Admin\CouponController@edit')->name('edit.coupon');
    Route::put('/coupons/update/{id}','Admin\CouponController@update')->name('update.coupon');
    Route::get('/coupons/delete/{id}','Admin\CouponController@destroy')->name('delete.coupon');
});
