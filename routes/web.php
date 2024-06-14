<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostcontentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagnameController;
use App\Http\Controllers\AcaraController;
use App\Http\Controllers\ECatalogController;
use App\Http\Controllers\PostVideoController;

Route::get('/testYT', function(Request $req){
    function GET($link, $param){
        $out = [];
        if(isset(parse_url($link)['query'])){
            foreach(explode('&', parse_url($link)['query']) as $k=>$co){
                $out += [explode('=', $co)[0] => explode('=', $co)[1]];
            }
            return $out[$param];
        }
        return null;
    }

    function getVideoCode($link){
        $code = null;
        if($link){
            $url = parse_url($link);
            $segments = explode('/', $url['path']);
    
            if     ($url['host'] == 'youtu.be') $code = $segments[1];
            else if($segments[1] == 'shorts')   $code = $segments[2];
            else if($segments[1] == 'watch')    $code = GET($link, 'v');
    
            return $code;
        }
        return null;
    }
    $videoCode = getVideoCode($req['link']);
    if($videoCode) echo '<iframe style="width:100%;height:100%;" src="https://www.youtube.com/embed/'.$videoCode.'"></iframe>';
    else{echo 'link required';}

});

Route::get('/e-catalog', function () {
    return view('landing.e-catalog');
});
Route::get('/e-catalog/detail', function () {
    return view('landing.e-catalog-detail');
})->name('landing.e-catalog.detail');

Route::get('/blog', function () {
    return view('backup.blog');
});
Route::get('/blog-details', function () {
    return view('backup.blog-details');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 
Route::controller(AcaraController::class)->group(function () {
    Route::get('/acara', 'acara')->name('acara');
    Route::get('/acara/get', 'acaraGet')->name('acara.get');    
    Route::get('/acara/detail/{id}', 'acaraDetail')->name('acara.detail');    
});

Route::controller(PostController::class)->group(function () {
    Route::get('/berita', 'berita')->name('berita');
    Route::get('/berita/detail/{slug}', 'beritaDetail')->name('berita.detail');
    Route::get('/berita/category/{slug}', 'beritaCategory')->name('berita.category');
    Route::get('/berita/tag/{slug}', 'beritaTag')->name('berita.tag');
    Route::get('/berita/tag', function(){return redirect(route('berita'));});
    Route::get('/berita/category', function(){return redirect(route('berita'));});
    
    Route::get('/', 'home')->name('home');

    Route::get('/berita/detail', function () {
        return view('landing.detail-berita');
    });
});

Route::controller(PostVideoController::class)->group(function () {
    Route::get('/video', 'berita')->name('berita');
    Route::get('/video/detail/{slug}', 'beritaDetail')->name('video.detail');
    Route::get('/video/category/{slug}', 'beritaCategory')->name('video.category');
    Route::get('/video/tag/{slug}', 'beritaTag')->name('video.tag');
    Route::get('/video/tag', function(){return redirect(route('berita'));});
    Route::get('/video/category', function(){return redirect(route('berita'));});
    
    Route::get('/video/detail', function () {
        return view('landing.detail-berita');
    });
});

Route::middleware('auth')->group(function () {
    Route::controller(AcaraController::class)->group(function () {
        Route::get('/member/acara/create', 'createView')->name('member.acara.create');
        Route::post('/member/acara/create', 'create')->name('member.acara.create.post');
        Route::get('/member/acara', 'read')->name('member.acara');
        Route::get('/member/acara/update/{id}', 'update')->name('member.acara.update');
        Route::get('/member/acara/delete/{id}', 'delete')->name('member.acara.delete');

        Route::get('/member/acara/slug/check', 'checkSlug')->name('member.acara.slug.check');
    });
    Route::controller(ECatalogController::class)->group(function () {
        Route::get('/member/e-catalog', 'read')->name('member.e-catalog');
        Route::get('/member/e-catalog/create', 'createView')->name('member.e-catalog.create');
        Route::post('/member/e-catalog/create', 'create')->name('member.e-catalog.post');
        Route::get('/member/e-catalog/slug/check', 'checkSlug')->name('member.e-catalog.slug.check');
    });
    Route::controller(PostVideoController::class)->group(function () {
        Route::get('/member/video', 'read')->name('member.video');
        Route::get('/member/video/create', 'createView')->name('member.video.create');
        Route::post('/member/video/create', 'create')->name('member.video.post');
        Route::get('/member/video/slug/check', 'checkSlug')->name('member.video.slug.check');
        
        Route::get('/member/video', 'read')->name('member.video');
        Route::get('/member/video/create', 'createView')->name('member.video.create');
        Route::post('/member/video/create', 'create')->name('member.video.create.post');
        
        Route::get('/member/video/update/{id}', 'updateView')->name('member.video.update');
        Route::post('/member/video/update', 'update')->name('member.video.update.post');

        Route::get('/member/video/delete/{id}', 'delete')->name('member.video.delete');
        
        Route::get('/member/video/publish/{id}', 'publish')->name('member.video.publish');
        Route::get('/member/video/unpublish/{id}', 'unpublish')->name('member.video.unpublish');

        Route::get('/member/video/category', 'readCategory')->name('member.video.category');
        Route::get('/member/video/detail/{id}', 'readDetail')->name('member.video.detail');
        Route::get('/member/video/tag', 'readTag')->name('member.video.tag');
        Route::get('/member/video/slug/check', 'checkSlug')->name('member.video.slug.check');

        Route::post('/member/video/newSection', 'newSection')->name('member.video.newSection');
        Route::get('/member/video/newSection/{id}', 'newSectionView')->name('member.video.newSection.View');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });

    Route::controller(PostcontentController::class)->group(function () {
        Route::get('/member/berita/postcontent/delete/{id}', 'delete')->name('postcontent.delete');
        Route::post('/member/berita/postcontent/edit', 'edit')->name('postcontent.edit');
        Route::post('/member/berita/postcontent/save', 'save')->name('postcontent.save');

        Route::get('/member/video/postcontent/delete/{id}', 'deleteVideo')->name('postcontent.video.delete');
        Route::post('/member/video/postcontent/edit', 'editVideo')->name('postcontent.video.edit');
        Route::post('/member/video/postcontent/save', 'saveVideo')->name('postcontent.video.save');
    });
    Route::controller(PostController::class)->group(function () {
        Route::get('/member/berita', 'read')->name('member.berita');
        Route::get('/member/berita/create', 'createView')->name('member.berita.create');
        Route::post('/member/berita/create', 'create')->name('member.berita.create.post');
        
        Route::get('/member/berita/update/{id}', 'updateView')->name('member.berita.update');
        Route::post('/member/berita/update', 'update')->name('member.berita.update.post');

        Route::get('/member/berita/delete/{id}', 'delete')->name('member.berita.delete');
        
        Route::get('/member/berita/publish/{id}', 'publish')->name('member.berita.publish');
        Route::get('/member/berita/unpublish/{id}', 'unpublish')->name('member.berita.unpublish');

        Route::get('/member/berita/category', 'readCategory')->name('member.berita.category');
        Route::get('/member/berita/detail/{id}', 'readDetail')->name('member.berita.detail');
        Route::get('/member/berita/tag', 'readTag')->name('member.berita.tag');
        Route::get('/member/berita/slug/check', 'checkSlug')->name('member.berita.slug.check');

        Route::post('/member/berita/newSection', 'newSection')->name('member.berita.newSection');
        Route::get('/member/berita/newSection/{id}', 'newSectionView')->name('member.berita.newSection.View');
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
        Route::get('/member/berita/tag/delete', 'deleteTag')->name('member.berita.tag.delete');
        Route::get('/member/berita/tag/add', 'addTag')->name('member.berita.tag.add');
        Route::get('/member/berita/tag/get', 'getTag')->name('member.berita.tag.get');

        Route::get('/member/video/tag/newTag', 'newTag')->name('member.video.newTag.add');
        Route::get('/member/video/tag/delete', 'deleteTag')->name('member.video.tag.delete');
        Route::get('/member/video/tag/add', 'addTag')->name('member.video.tag.add');
        Route::get('/member/video/tag/get', 'getTag')->name('member.video.tag.get');
    });
});

require __DIR__.'/auth.php';
