<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RockController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/cardtest', function () {
    return view('card-test');
});

Route::get('/carttest', function () {
    return view('cart-test');
});

Route::get('/carttestlivewire', function () {
    return view('cart-test-livewire');
})->name('carttestlivewire');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/rocks/{rock}/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::resource('rocks', RockController::class);
    Route::resource('orders', OrderController::class);


});

require __DIR__ . '/auth.php';
