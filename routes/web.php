<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{productId}', [ProductController::class, 'show'])->name('products.show');

Route::middleware(['auth'])->group(function() {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/orders/{orderId}', [OrderController::class, 'show'])->name('orders.show');
});

Route::middleware(['auth'])->controller(PaymentController::class)
    ->prefix('paypal')
    ->group(function () {
        Route::view('payment', 'paypal.index')->name('create.payment');
        Route::get('handle-payment/{productId}', 'handlePayment')->name('make.payment');
        Route::get('cancel-payment/{productId}', 'paymentCancel')->name('cancel.payment');
        Route::get('payment-success/{productId}', 'paymentSuccess')->name('success.payment');
    });
