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

Route::get('/',[App\Http\Controllers\HomeController::class, 'new_daily'])->name('new_daily');
Route::get('/macbook/{slug}',[App\Http\Controllers\User\ProductController::class, 'index'])->name('user_product');

Route::get('/login' , function(){
    return view('layouts.app');
});

Auth::routes();
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// App\Http\Controllers\Admin\UserController::class, 'index'
Route::group(['prefix' => 'admin' , 'as' =>'admin.' , 'middleware' =>'accessadmin'], function(){
    Route::get('', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    
    Route::get('user' , [App\Http\Controllers\Admin\UserController::class, 'index'])->name('user');
    Route::delete('deleteuser/{id}' , [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('delete_user');
    
    
    Route::get('category' , [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category');
    Route::post('category' , [App\Http\Controllers\Admin\CategoryController::class, 'store'])
        ->name('add_category')->middleware('missingcategoryadd');
    Route::delete('category/{id}' , [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('delete_category');
    
    
    Route::get('product' , [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product');
    Route::get('product/category/{slug}' , [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product_slug');

    Route::post('product' , [App\Http\Controllers\Admin\ProductController::class, 'store'])
        ->name('add_product')->middleware('missingproductadd');
    Route::delete('product/{id}' , [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('delete_product');
    Route::get('product/{slug}' , [App\Http\Controllers\Admin\ProductController::class, 'show'])->name('product_detail');
    Route::put('product/{id}' , [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update_product');

});