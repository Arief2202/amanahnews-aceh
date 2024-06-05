<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagnameController;

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


Route::controller(PostController::class)->group(function () {
    Route::get('/berita', 'berita')->name('berita');
    Route::get('/berita/detail/{slug}', 'beritaDetail')->name('berita.detail');
    
    Route::get('/', 'home')->name('home');

    Route::get('/berita/detail', function () {
        return view('landing.detail-berita');
    });
});

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

        Route::get('/member/berita/publish/{id}', 'publish')->name('member.berita.publish');
        Route::get('/member/berita/unpublish/{id}', 'unpublish')->name('member.berita.unpublish');

        Route::get('/member/berita/category', 'readCategory')->name('member.berita.category');
        Route::get('/member/berita/detail/{id}', 'readDetail')->name('member.berita.detail');
        Route::get('/member/berita/tag', 'readTag')->name('member.berita.tag');
        Route::get('/member/berita/slug/check', 'checkSlug')->name('member.berita.slug.check');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/member/berita/category', 'read')->name('member.berita.category');
        Route::get('/member/berita/category/create', 'createView')->name('member.berita.category.create');
        Route::post('/member/berita/category/create', 'create')->name('member.berita.category.post');
        Route::get('/member/berita/category/slug/check', 'checkSlug')->name('member.berita.category.slug.check');
        
        Route::get('/member/berita/category/newCategory', 'newCategory')->name('member.berita.newCategory.add');
    });
    Route::controller(TagnameController::class)->group(function () {
        Route::get('/member/berita/tag', 'read')->name('member.berita.tag');
        Route::get('/member/berita/tag/create', 'createView')->name('member.berita.tag.create');
        Route::post('/member/berita/tag/create', 'create')->name('member.berita.tag.post');
        Route::get('/member/berita/tag/slug/check', 'checkSlug')->name('member.berita.tag.slug.check');
        
        Route::get('/member/berita/tag/newTag', 'newTag')->name('member.berita.newTag.add');
        Route::get('/member/berita/tag/add', 'addTag')->name('member.berita.tag.add');
        Route::get('/member/berita/tag/get', 'getTag')->name('member.berita.tag.get');
    });
});

require __DIR__.'/auth.php';
