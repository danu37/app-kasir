<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\TransactionController;

Route::get('/', [HomeController::class, 'index'])->name('landing.home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('landing.about');
Route::get('/produk', [HomeController::class, 'products'])->name('landing.products');
Route::get('/harga', [HomeController::class, 'pricing'])->name('landing.pricing');
Route::get('/faq', [HomeController::class, 'faq'])->name('landing.faq');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/kasir', [CashierController::class, 'index'])->name('cashier.index');
    Route::post('/kasir', [CashierController::class, 'store'])->name('cashier.store');

    Route::get('/barang', [ProductController::class, 'index'])->name('products.index');
    Route::get('/barang/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/barang', [ProductController::class, 'store'])->name('products.store');
    Route::get('/barang/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/barang/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/barang/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/transaksi', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/transaksi', [TransactionController::class, 'store'])->name('transactions.store');
    Route::get('/riwayat', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/riwayat/{transaction}', [TransactionController::class, 'show'])->name('transactions.show');

    Route::get('/penjualan', [ReportController::class, 'index'])->name('reports.sales');
    Route::get('/penjualan/export', [ReportController::class, 'export'])->name('reports.sales.export');
    Route::get('/statistik', [StatisticController::class, 'index'])->name('statistics');

    Route::get('/profil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profil', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profil/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});
