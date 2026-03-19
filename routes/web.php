<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ─── Product listing routes ───────────────────────────────────────────────────
Route::get('/products',                        [SearchController::class, 'index'])->name('products.index');
Route::get('/products/new',                    [ProductController::class, 'newArrivals'])->name('products.new');
Route::get('/products/{year}',                 [ProductController::class, 'byYear'])->name('products.year')->where('year', '[0-9]{4}');
Route::get('/products/category/{id}',          [ProductController::class, 'byCategory'])->name('products.category');
Route::get('/products/brand/{id}',             [ProductController::class, 'byBrand'])->name('products.brand');
Route::get('/products/collection/{id}',        [ProductController::class, 'byCollection'])->name('products.collection');

// ─── Guest-only routes ────────────────────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->middleware('throttle:login');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email')->middleware('throttle:6,1');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'store'])->name('password.update');
});

// ─── Authenticated-only routes ────────────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    Route::post('/logout', [LogoutController::class, 'destroy'])->name('logout');
});

// ─── Internal API proxy ───────────────────────────────────────────────────────
Route::get('/api/lead-times', function () {
    try {
        $response = Http::timeout(10)->get('https://www2.arielpremium.com/api/leadtimes');
        return response()->json($response->json());
    } catch (\Exception $e) {
        return response()->json(['error' => 'Failed to fetch lead times'], 502);
    }
})->name('api.lead-times');
