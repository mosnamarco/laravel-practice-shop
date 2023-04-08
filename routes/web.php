<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/shop', [App\Http\Controllers\ProductController::class, 'index'])->name('shop');
Route::get('/shop/add', [App\Http\Controllers\ProductController::class, 'create'])->name('add');
Route::post('/shop/store', [ProductController::class, 'store'])->name('store');
Route::get('/shop/edit/{id}', [ProductController::class, 'edit'])->name('edit');
Route::post('/shop/update/{id}', [ProductController::class, 'update'])->name('update');
Route::delete('/shop/delete/{id}', [ProductController::class, 'destroy'])->name('delete');