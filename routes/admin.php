<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::get('/', 'Admin\LoginController@show')->name('login');
Route::get('/login', 'Admin\LoginController@show')->name('adminlogin');
Route::post('/login','Admin\LoginController@login');
//Route::post('/logout','Admin\DashboardController@logout')->name('admin.logout');
//Route::get('/logout','Admin\DashboardController@logout')->name("admin_logout");

Route::get('/register', 'Admin\RegisterController@show')->name('admin.register');
Route::post('/register', 'Admin\RegisterController@create');
Auth::guard('admin');
Route::post('/logout','Admin\DashboardController@logout')->name('admin.logout');

Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

Route::get('/sections/list', [App\Http\Controllers\Admin\SectionsController::class,'index'])->name('sections.list');
Route::get('/sections/home', [App\Http\Controllers\Admin\SectionsController::class,'home'])->name('manage.home');
Route::post('/sections/home', [App\Http\Controllers\Admin\SectionsController::class,'store'])->name('store.home');
Route::get('/sections/about-us', [App\Http\Controllers\Admin\SectionsController::class,'aboutUs'])->name('manage.home');
Route::post('/sections/about-us', [App\Http\Controllers\Admin\SectionsController::class,'store'])->name('store.aboutus');

Route::post('/media/upload', [App\Http\Controllers\Admin\MediaController::class,'upload'])->name('media.upload');
