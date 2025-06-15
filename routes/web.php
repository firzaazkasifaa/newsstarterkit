<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    SocialiteController,
    ReporterDashboardController,
    ArticleController,
    HomeController
};
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini kamu bisa mendaftarkan route untuk aplikasi Laravel kamu.
| Route-route ini akan dimuat oleh RouteServiceProvider dalam grup middleware "web".
*/

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route Autentikasi (dari auth.php)
require __DIR__.'/auth.php';

// <--- TAMBAHAN UNTUK MEMAKSA LOGIN MENGGUNAKAN BLADE --->
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
// <--- END TAMBAHAN --->

// Route Login Sosial (Google/GitHub/Microsoft)
Route::middleware(['web'])->group(function () {
    Route::controller(SocialiteController::class)->group(function () {
        Route::get('/auth/{provider}', 'redirect')
            ->name('socialite.redirect')
            ->where('provider', 'google|github|microsoft');

        Route::get('/auth/{provider}/callback', 'callback')
            ->name('socialite.callback')
            ->where('provider', 'google|github|microsoft');
    });
});

// Route untuk pengguna yang sudah login (umum)
Route::middleware(['auth', 'verified'])->group(function () {
// Dashboard - Redirect berdasarkan role
Route::get('/dashboard', function () {
    $role = Auth::user()->role;

    return match ($role) {
        'admin' => view('dashboard'),
        'reporter' => redirect()->route('reporter.dashboard'),
        'test' => redirect()->route('test.dashboard'),
        default => abort(403, 'Role tidak dikenali'),
    };
})->name('dashboard');


    // Route Untuk Profile User
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    // Dashboard & Fitur Khusus Reporter
    Route::middleware('can:reporter')->group(function () {
        Route::get('/dashboard/reporter', [ReporterDashboardController::class, 'index'])
            ->name('reporter.dashboard');

        // CRUD Artikel (khusus reporter)
        Route::resource('articles', ArticleController::class)->except(['show']);

        // Publish Artikel
        Route::post('/articles/{article}/publish', [ArticleController::class, 'publish'])
            ->name('articles.publish');
    });

    // Dashboard Khusus Test User
    Route::get('/dashboard/test', function () {
        return view('test.dashboard');
    })->name('test.dashboard');
});
