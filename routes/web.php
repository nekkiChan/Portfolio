<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function (): void {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';

use App\Http\Controllers\public\mainmenu\MainMenuController;

Route::prefix('/')->name('public.')->group(function (): void {
    Route::prefix('/')->name('mainmenu.')->group(function (): void {
        Route::get('/', [MainMenuController::class, 'index'])->name('index');
    });
});


use App\Http\Controllers\private\profile\ProfileEditController;

Route::prefix('/private')->name('private.')->group(function (): void {
    Route::prefix('/profile')->name('profile.')->group(function (): void {
        Route::prefix('/edit')->name('edit.')->group(function (): void {
            Route::get('/', [ProfileEditController::class, 'index'])->name('index');
            Route::post('/action', [ProfileEditController::class, 'action'])->name('action');
        });
    });
});
