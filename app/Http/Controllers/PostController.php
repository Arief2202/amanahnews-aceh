<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\category;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function berita(){
        return view('landing.berita', [
            'categories' => category::all(),
            'carousel_items' => Post::all(),
            'newest' => Post::all(),
            'popular' => Post::all(),
            'trendings' => Post::all(),
            'others' => Post::all(),
        ]);
    }
    public function beritaDetail($slug){
        $post = Post::where('slug', $slug)->first();
        return view('landing.detail-berita', [
            'post' => $post,
            'hots' => Post::all(),
        ]);
    }

    public function read()
    {
        return view('member.berita.read', [
            'posts' => Post::all(),
        ]);
    }
    public function createView()
    {
        return view('member.berita.create', [
            'categories' => Category::all(),
        ]);
    }
    public function readDetail($id)
    {
        return view('member.berita.detail', [
            'post' => Post::where('id', $id)->first(),
        ]);
    }
    public function create(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'category' => 'required',
            'image' => 'required',
            'image_source' => 'required',
            'title' => 'required',
            'slug' => 'required|unique:posts|max:255',
            'content' => 'required'
        ]);
        $destinationPath = 'uploads/post/image';
        $imageName = $request->slug.'.'.$request->image->extension();
        $request->image->move(public_path($destinationPath), $imageName);
        $post = Post::create([
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'banner' => $imageName,
            'banner_source' => $request->image_source,
            'slug' => $request->slug,
            'content' => $request->content,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect(route('member.berita.detail', ['id' => $post->id]));

    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
