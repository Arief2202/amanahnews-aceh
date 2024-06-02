<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.index');
});
Route::get('/berita', function () {
    return view('landing.berita');
});
Route::get('/berita/detail', function () {
    return view('landing.detail-berita');
});
Route::get('/e-catalog', function () {
    return view('landing.e-catalog');
});
Route::get('/acara', function () {
    return view('landing.acara');
});
Route::get('/video', function () {
    return view('landing.video');
});

Route::get('/blog', function () {
    return view('backup.blog');
});
Route::get('/blog-details', function () {
    return view('backup.blog-details');
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
