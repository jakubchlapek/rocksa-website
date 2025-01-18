<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RockController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cardtest', function () {
    return view('card-test');
});
Route::get('/carttest', function () {
    return view('cart-test');
});

Route::get('/carttestlivewire', function () {
    return view('cart-test-livewire');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('rocks', RockController::class);
});

require __DIR__ . '/auth.php';

Route::resource('/comments', CommentController::class);
