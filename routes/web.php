<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagnameController;

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
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    Route::controller(PostController::class)->group(function () {
        Route::get('/member/berita', 'read')->name('member.berita');
        Route::get('/member/berita/create', 'createView')->name('member.berita.create');
        Route::post('/member/berita/create', 'create')->name('member.berita.create.post');

        Route::get('/member/berita/category', 'readCategory')->name('member.berita.category');
        Route::get('/member/berita/tag', 'readTag')->name('member.berita.tag');
        Route::get('/member/berita/slug/check', 'checkSlug')->name('member.berita.slug.check');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/member/berita/category', 'read')->name('member.berita.category');
        Route::get('/member/berita/category/create', 'createView')->name('member.berita.category.create');
        Route::post('/member/berita/category/create', 'create')->name('member.berita.category.post');
    });
    Route::controller(TagnameController::class)->group(function () {
        Route::get('/member/berita/tag', 'read')->name('member.berita.tag');
        Route::get('/member/berita/tag/create', 'createView')->name('member.berita.tag.create');
        Route::post('/member/berita/tag/create', 'create')->name('member.berita.tag.post');
    });
});

require __DIR__.'/auth.php';
