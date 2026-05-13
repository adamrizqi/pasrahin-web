<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// ─── Public Routes ───────────────────────────────────────────────
Route::get('/', [OrderController::class, 'create'])->name('home');

// ─── Unified Auth Routes ─────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    
    // Register is specifically for customers (others created internally)
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ─── Customer Routes ─────────────────────────────────────────────
Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');
    Route::post('/payment/success/{order}', [CustomerController::class, 'paymentSuccess'])->name('payment.success');
    Route::delete('/orders/{order}', [CustomerController::class, 'cancelOrder'])->name('orders.cancel');
    Route::patch('/orders/{order}/confirm', [CustomerController::class, 'confirmReceived'])->name('orders.confirm');
    Route::get('/orders/check-updates', [CustomerController::class, 'checkUpdates'])->name('orders.check-updates');
});

// Protected order creation
Route::middleware(['auth', 'role:customer'])->post('/orders', [OrderController::class, 'store'])->name('orders.store');

// ─── Mitra Routes ────────────────────────────────────────────────
Route::middleware(['auth', 'role:mitra'])->prefix('mitra')->name('mitra.')->group(function () {
    Route::get('/dashboard', [MitraController::class, 'dashboard'])->name('dashboard');
    Route::get('/settings', [MitraController::class, 'settings'])->name('settings');
    Route::post('/settings', [MitraController::class, 'updateSettings'])->name('settings.update');
    Route::get('/orders', [MitraController::class, 'orders'])->name('orders.history');
    Route::patch('/orders/{order}/accept', [MitraController::class, 'accept'])->name('orders.accept');
    Route::patch('/orders/{order}/complete', [MitraController::class, 'complete'])->name('orders.complete');
    Route::post('/payout/request', [App\Http\Controllers\PayoutController::class, 'requestPayout'])->name('payout.request');
});

// ─── Chat Routes (Shared) ────────────────────────────────────────
Route::middleware(['auth'])->group(function () {
    Route::get('/orders/{order}/chat', [\App\Http\Controllers\ChatController::class, 'index'])->name('chat.index');
    Route::post('/orders/{order}/chat', [\App\Http\Controllers\ChatController::class, 'store'])->name('chat.store');
    Route::get('/orders/{order}/chat/check', [\App\Http\Controllers\ChatController::class, 'checkNewMessages'])->name('chat.check');
});

// ─── Admin Routes ────────────────────────────────────────────────
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
    Route::delete('/orders/{order}', [AdminController::class, 'deleteOrder'])->name('orders.destroy');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::patch('/users/{user}/role', [AdminController::class, 'updateUserRole'])->name('users.role.update');
    Route::patch('/payouts/{payout}/complete', [AdminController::class, 'completePayout'])->name('payouts.complete');
});
