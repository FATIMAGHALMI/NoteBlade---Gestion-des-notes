<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/notes/index', [NoteController::class, 'index'])->name('dashboard');
    Route::get('/notes/search', [NoteController::class, 'index'])->name('notes.search');
    Route::resource('notes', NoteController::class);
    Route::resource('categories', CategoryController::class);

    
});

require __DIR__.'/auth.php';
