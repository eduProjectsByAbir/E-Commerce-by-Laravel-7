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
    Route::get('/categories','Admin\CategoryController@index')->name('category');
    Route::post('/categories/add','Admin\CategoryController@store')->name('add.category');
});
