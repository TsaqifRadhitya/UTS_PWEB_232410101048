<?php

use App\Http\Controllers\pageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [pageController::class, 'dashboardPage'])->name('dashboard');

Route::get('login', [pageController::class, 'loginPage'])->name('login.index');
Route::post('login', [pageController::class, 'loginStore'])->name('login.store');
Route::post('logout', [pageController::class, 'logout'])->name('logout');

Route::get('profile', [pageController::class, 'profilePage'])->name('profile');

Route::prefix('kelola')->group(function () {
    Route::get('/', [pageController::class, 'kelolaPage'])->name('kelola.index');
    Route::post('/', [pageController::class, 'kelolaStore'])->name('kelola.store');
});
