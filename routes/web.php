<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\CommentController;

Route::middleware(['auth'])->group(function () {
    Route::resource('documents', DocumentController::class);
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/documents', [DocumentController::class, 'adminIndex'])
    ->name('admin.documents');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
