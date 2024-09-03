<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtworkController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AdminController;

// Home route
Route::get('/', function () {
    // Fetch featured artworks or any other data needed for the homepage
    $featuredArtworks = \App\Models\Artwork::where('featured', true)->get();
    return view('home', compact('featuredArtworks'));
})->name('home');

// Artworks routes
Route::resource('artworks', ArtworkController::class);

// Shopping Cart routes
Route::prefix('cart')->name('cart.')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('index');
    Route::post('/store', [CartController::class, 'store'])->name('store');
    Route::delete('/remove/{id}', [CartController::class, 'destroy'])->name('remove');
});

// Checkout route
Route::get('/checkout', [OrderController::class, 'index'])->name('checkout.index');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');

// Review route
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// User Profile route
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// Admin route
Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.index');

// Authentication routes
Auth::routes(); // This includes login, registration, password reset, etc.
