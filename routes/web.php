<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\FlyerController;
use App\Http\Controllers\Admin\LocationController;

// ==============================
// ROUTE FRONTEND (USER SIDE)
// ==============================
Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/aktivitas', [PageController::class, 'aktivitas'])->name('aktivitas');
Route::get('/outlet', [PageController::class, 'outlet'])->name('outlet');
Route::get('/tentang-kami', [PageController::class, 'about'])->name('about');

// ------------------------------
// PRODUK (Katalog Produk D’jamoe)
// ------------------------------
// Halaman utama produk → tampilkan daftar kategori
Route::get('/produk', [PageController::class, 'produk'])->name('produk.index');

// AJAX: ambil produk berdasarkan kategori
Route::get('/produk/kategori/{category}', [PageController::class, 'getProductsByCategory'])
    ->name('produk.kategori');

// AJAX: ambil detail produk
Route::get('/produk/detail/{product}', [PageController::class, 'getProductDetail'])
    ->name('produk.detail');


// ==============================
// ROUTE ADMIN (AdminLTE Dashboard)
// ==============================
Route::prefix('admin')
    ->name('admin.')
    // ->middleware('auth') // aktifkan jika sudah ada login sistem
    ->group(function () {
        // Dashboard default: tampilkan daftar produk
        Route::get('/', [ProductController::class, 'index'])->name('dashboard');

        // CRUD Resources
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('locations', LocationController::class);
        Route::resource('articles', ArticleController::class);
        Route::resource('abouts', AboutController::class);
        Route::resource('flyers', FlyerController::class);
    });

// ==============================
// AUTENTIKASI (Opsional)
// ==============================
// require __DIR__.'/auth.php';
