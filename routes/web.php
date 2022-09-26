<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

#region PRODUCT

// Home page
Route::get('/', [ProductController::class, 'index']);

// Show a single product
Route::get('products/{product}', [ProductController::class, 'show'])->name('user.show');

#endregion

#region CARD
Route::controller(CardController::class)
    ->middleware('role:user')
    ->group(function () {
        Route::get('/card/{card}', 'index');
        Route::get('/card/{card}/recharge', 'recharge');
        Route::put('/card/payment/{card}', 'payment');
    });
#endregion

#region ADMIN

Route::controller(AdminController::class)
    ->middleware('role:administrator')
    ->group(function () {
        Route::get('/admin', 'index');
        Route::get('/admin/users', 'users');
        Route::get('/admin/products', 'products');
        Route::get('admin/payments', 'payments');
        Route::post('admin/register', 'storeByAdmin')->name('admin.store');
    });

Route::controller(ProductController::class)
    ->middleware('role:administrator')
    ->group(function () {
        Route::get('/admin/products/create', 'create')->name('admin.create-product');
        Route::post('/admin/products/store', [ProductController::class, 'store'])->name('product.store');
    });
#endregion

#region CART
Route::controller(CartController::class)
    ->group(function () {
        Route::get('/cart', 'index')
            ->name('cart.index');
        Route::post('/cart/store', 'store')->name('cart.store');
        Route::get('/cart/remove/{rowId}', 'remove')->name('cart.remove');
        Route::get('/cart/increase/{rowId}', 'increase')->name('cart.increase');
        Route::get('/cart/decrease/{rowId}', 'decrease')->name('cart.decrease');
    });
Route::post('/cart/pay', [CardController::class, 'checkout'])->name('cart.pay')->middleware('role:user');
#endregion

#region USER

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

#endregion

#region PAYMENT with Paypal
Route::get('payment', [PaymentController::class, 'index']);
Route::post('charge', [PaymentController::class, 'charge']);
Route::get('success', [PaymentController::class, 'success']);
Route::get('error', [PaymentController::class, 'error']);
#endregion

Route::get('/about', function () {
    return view('about');
});