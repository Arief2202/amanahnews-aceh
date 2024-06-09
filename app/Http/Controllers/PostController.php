<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\postcontent;
use App\Models\category;
use App\Models\tagname;
use App\Models\Post;
use App\Models\tag;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File; 

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home(){
        return view('landing.index', [
            'carousel_items' => Post::where('show', 1)->get(),
            'newest' => Post::where('show', 1)->get(),
            'populars' => Post::where('show', 1)->get(),
            'trendings' => Post::where('show', 1)->get(),
            'others' => Post::where('show', 1)->get(),
        ]);
    }
    public function berita(){
        return view('landing.berita', [
            'categories' => category::all(),
            'carousel_items' => Post::where('show', 1)->get(),
            'newest' => Post::where('show', 1)->orderBy('id', 'DESC')->get(),
            'populars' => Post::where('show', 1)->orderBy('view_monthly', 'DESC')->get(),
            'trendings' => Post::where('show', 1)->orderBy('view_weekly', 'DESC')->get(),
            'others' => Post::where('show', 1)->get(),
        ]);
    }
    public function beritaCategory($slug){
        $category = Category::where('slug', $slug)->first();
        if($category){
            
            return view('landing.berita-category', [
                'categories' => category::all(),
                'selected' => $category,
                'filters' => Post::where('category_id', $category->id)->get(),
                'newest' => Post::where('show', 1)->orderBy('id', 'DESC')->get(),
                'populars' => Post::where('show', 1)->orderBy('view_monthly', 'DESC')->get(),
                'trendings' => Post::where('show', 1)->orderBy('view_weekly', 'DESC')->get(),
                'others' => Post::where('show', 1)->get(),
            ]);
        }
        return redirect('berita');
    }
    public function beritaTag($slug){
        $tagname = tagname::where('slug', $slug)->first();
        if($tagname){
            $tag = tag::where('tagname_id', $tagname->id)->with(['post'])->get();
            return view('landing.berita-tag', [
                'categories' => category::all(),
                'selected' => $tagname,
                'filters' => $tag,
                'newest' => Post::where('show', 1)->orderBy('id', 'DESC')->get(),
                'populars' => Post::where('show', 1)->orderBy('view_monthly', 'DESC')->get(),
                'trendings' => Post::where('show', 1)->orderBy('view_weekly', 'DESC')->get(),
                'others' => Post::where('show', 1)->get(),
            ]);
        }
        return redirect('berita');
    }
    public function beritaDetail($slug){
        $post = Post::where('show', 1)->where('slug', $slug)->first();
        if($post){
            $post->view_total = $post->view_total + 1;
            $post->view_monthly = $post->view_monthly + 1;
            $post->view_weekly = $post->view_weekly + 1;
            $post->save();
            return view('landing.detail-berita', [
                'post' => $post,
                'hots' => Post::with(['contents'])->get()
            ]);
        }
        return redirect('berita');
    }

    public function read()
    {
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.berita.read', [
            'posts' => Post::all(),
        ]);
    }
    public function createView()
    {
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.berita.create', [
            'categories' => Category::all(),
        ]);
    }
    public function readDetail($id)
    {
        if(Auth::user()->role != '1') return redirect('/');
        $post = Post::where('id', $id)->first();
        // $tagPost = tag::where('post_id', $post->id)->get();
        // foreach($tagPost <= )
        return view('member.berita.detail', [
            'post' => $post,
            'tags' => tagname::all(),
            'postcontents' => postcontent::where('post_id', $post->id)->get(),
            'postTags' => tag::with(['tagname'])->where('post_id', $post->id)->get(),
            'post_id' => $id,
        ]);
    }
    public function create(Request $request)
    {
        if(Auth::user()->role != '1') return redirect('/');
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
    
    public function updateView($id)
    {
        
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.berita.update', [
            'categories' => Category::all(),
            'post' => Post::where('id', $id)->first(),
        ]);
    }
    public function update(Request $request)
    {
        if(Auth::user()->role != '1') return redirect('/');
        $post = Post::where('id', $request->id)->first();

        if($request->slug == $post->slug){
            $validated = $request->validate([
                'id' => 'required',
                'user_id' => 'required',
                'category_id' => 'required',
                'category' => 'required',
                'image_source' => 'required',
                'title' => 'required',
                'content' => 'required'
            ]);
        }
        else {
            $validated = $request->validate([
                'id' => 'required',
                'user_id' => 'required',
                'category_id' => 'required',
                'category' => 'required',
                'image_source' => 'required',
                'title' => 'required',
                'slug' => 'required|unique:posts|max:255',
                'content' => 'required'
            ]);
        }

        if($request->image){
            $destinationPath = public_path().'\uploads\post\image';
            $imageName = $destinationPath.'\\'.$post->banner;
            File::delete($imageName);

            $destinationPath = 'uploads/post/image';
            $imageName = $request->slug.'.'.$request->image->extension();
            $request->image->move(public_path($destinationPath), $imageName);
            $post->banner =  $imageName;
        }

        $post->user_id =  $request->user_id;
        $post->category_id =  $request->category_id;
        $post->title =  $request->title;
        $post->banner_source =  $request->image_source;
        $post->slug =  $request->slug;
        $post->content =  $request->content;
        $post->updated_at =  date('Y-m-d H:i:s');
        $post->save();

        return redirect(route('member.berita.detail', ['id' => $post->id]));

    }

    public function checkSlug(Request $request){
        if(Auth::user()->role != '1') return redirect('/');
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function publish($id, Request $request){
        if(Auth::user()->role != '1') return redirect('/');
        $post = Post::where('id', $id)->first();
        if($post->user_id != Auth::user()->id) return redirect(route('member.berita'));
        $post->show=1;
        $post->save();
        return redirect(route('member.berita'));
    }
    public function unpublish($id, Request $request){
        if(Auth::user()->role != '1') return redirect('/');
        $post = Post::where('id', $id)->first();
        if($post->user_id != Auth::user()->id) return redirect(route('member.berita'));
        $post->show=0;
        $post->save();
        return redirect(route('member.berita'));
    }

    public function newSection(Request $request){
        if(Auth::user()->role != '1') return redirect('/');
        $request->validate([
            'post_id' => 'required',
            'type' => 'required',
        ]);
        $post = Post::where('id', $request->post_id)->first();
        if(Auth::user()->id == $post->user_id){
            $postContent = postcontent::create([
                'post_id' => $request->post_id,
                'type' => $request->type,
            ]);
        }
        return redirect(route('member.berita.detail', ['id' => $post->id]));
    }
}
