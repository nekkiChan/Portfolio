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
use App\Http\Controllers\private\owner\OwnerEditController;
use App\Http\Controllers\private\contents\menu\ContentsMenuController;
use App\Http\Controllers\private\contents\category\ContentsCategoryListController;
use App\Http\Controllers\private\contents\category\ContentsCategoryEditController;
use App\Http\Controllers\private\contents\subcategory\ContentsSubCategoryListController;
use App\Http\Controllers\private\contents\subcategory\ContentsSubCategoryEditController;

Route::middleware(['auth'])->prefix('/private')->name('private.')->group(function (): void {
    // profile
    Route::prefix('/profile')->name('profile.')->group(function (): void {
        Route::prefix('/edit')->name('edit.')->group(function (): void {
            Route::get('/', [ProfileEditController::class, 'index'])->name('index');
            Route::post('/action', [ProfileEditController::class, 'action'])->name('action');
        });
    });
    // owner
    Route::prefix('/owner')->name('owner.')->group(function (): void {
        Route::prefix('/edit')->name('edit.')->group(function (): void {
            Route::get('/', [OwnerEditController::class, 'index'])->name('index');
            Route::post('/action', [OwnerEditController::class, 'action'])->name('action');
        });
    });
    // contents
    Route::prefix('/contents')->name('contents.')->group(function (): void {
        // menu
        Route::prefix('/menu')->name('menu.')->group(function (): void {
            Route::get('/', [ContentsMenuController::class, 'index'])->name('index');
            Route::post('/action', [ContentsMenuController::class, 'action'])->name('action');
        });
        // category
        Route::prefix('/category')->name('category.')->group(function (): void {
            // list
            Route::prefix('/list')->name('list.')->group(function (): void {
                Route::get('/', [ContentsCategoryListController::class, 'index'])->name('index');
                Route::post('/action', [ContentsCategoryListController::class, 'action'])->name('action');
            });
            // edit
            Route::prefix('/edit')->name('edit.')->group(function (): void {
                Route::get('/', [ContentsCategoryEditController::class, 'index'])->name('index');
                Route::post('/action', [ContentsCategoryEditController::class, 'action'])->name('action');
            });
        });
        // subcategory
        Route::prefix('/subcategory')->name('subcategory.')->group(function (): void {
            // list
            Route::prefix('/list')->name('list.')->group(function (): void {
                Route::get('/', [ContentsSubCategoryListController::class, 'index'])->name('index');
                Route::post('/action', [ContentsSubCategoryListController::class, 'action'])->name('action');
            });
            // edit
            Route::prefix('/edit')->name('edit.')->group(function (): void {
                Route::get('/', [ContentsSubCategoryEditController::class, 'index'])->name('index');
                Route::post('/action', [ContentsSubCategoryEditController::class, 'action'])->name('action');
            });
        });
    });
});
