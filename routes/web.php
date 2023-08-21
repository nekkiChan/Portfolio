<?php

use Illuminate\Support\Facades\Route;

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

// home
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// profile
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

// works
Route::get('/works', [App\Http\Controllers\WorkController::class, 'index'])->name('works');

// informations
Route::get('/informations', [App\Http\Controllers\InformationController::class, 'index'])->name('informations');

// administrators

// login
Auth::routes();
Route::get('/login', [App\Http\Controllers\LoginController::class, 'index'])->name('login');

Route::prefix('administrators')->group(function () {
    // works
    Route::get('works/create', [App\Http\Controllers\WorkController::class, 'create'])->name('work.create');
    Route::post('works', [App\Http\Controllers\WorkController::class, 'store'])->name('work.store');
    // informations
    Route::get('informations/create', [App\Http\Controllers\InformationController::class, 'create'])->name('information.create');
    Route::post('informations', [App\Http\Controllers\InformationController::class, 'store'])->name('information.store');
});
