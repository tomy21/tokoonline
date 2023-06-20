<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
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

Route::get('/', [Controller::class, 'index'])->name('home');
Route::get('/shop', [Controller::class, 'shop'])->name('shop');
Route::get('/transaksi', [Controller::class, 'transaksi'])->name('transaksi');
Route::get('/contact', [Controller::class, 'contact'])->name('contact');
Route::get('/checkout', [Controller::class, 'checkout'])->name('checkout');

// Route::get('/admin', [Controller::class, 'admin'])->name('admin');
Route::get('/admin/dashboard', [Controller::class, 'admin'])->name('admin');
Route::get('/admin/product', [ProductController::class, 'index'])->name('product');
Route::get('/admin/user_management', [Controller::class, 'userManagement'])->name('userManagement');
Route::get('/admin/report', [Controller::class, 'report'])->name('report');
Route::get('/admin/addModal', [ProductController::class, 'addModal'])->name('addModal');

Route::POST('/admin/addData', [ProductController::class, 'store'])->name('addData');
Route::GET('/admin/editModal/{id}', [ProductController::class, 'show'])->name('editModal');
Route::PUT('/admin/updateData/{id}', [ProductController::class, 'update'])->name('updateData');
Route::DELETE('/admin/deleteData/{id}', [ProductController::class, 'destroy'])->name('deleteData');
