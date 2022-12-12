<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionReport;

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('product');
    Route::post('/cart', [CartController::class, 'addToCart'])->name('addtocart');
    Route::get('/product/{code}', [ProductController::class, 'show']);
    Route::get('/shopping-cart', [CartController::class, 'checkoutPage']);
    Route::post('/checkout', [CartController::class, 'checkoutProcess'])->name('checkout.process');
    Route::get('/order-report', [TransactionReport::class, 'report']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
