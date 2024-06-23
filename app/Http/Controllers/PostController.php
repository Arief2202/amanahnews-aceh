<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ApaKataMereka;
use App\Models\StatisticsView;
use App\Models\postcontent;
use App\Models\category;
use App\Models\tagname;
use App\Models\Post;
use App\Models\tag;
use App\Models\faq;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\File; 
use Carbon\Carbon;

function resetView(){
    $dateMin1 = Carbon::now()->subDays(1);
    // dd($newDateTime);
    $stats = StatisticsView::where('date', date('Y-m-d', strtotime($dateMin1))." 00:00:00")->first();
    if(!$stats){
        $stats = StatisticsView::create([
            'date' => date('Y-m-d', strtotime($dateMin1))." 00:00:00",
            'totalViews' => 0,
        ]);
    }
    $posts = Post::where('last_reset_daily', '<', date('Y-m-d')." 00:00:00")->get();
    foreach($posts as $post){
        $now = Carbon::now();
        
        $stats->totalViews += (int) $post->view_daily;
        $post->view_daily = 0;
        $post->last_reset_daily = $now;

        $date = Carbon::parse($post->last_reset_weekly);
        $diff = $date->diffInDays($now);
        if($diff>=7){
            $post->view_weekly = 0;
            $post->last_reset_weekly = $now;
        }

        $date = Carbon::parse($post->last_reset_monthly);
        $diff = $date->diffInDays($now);
        if($diff>=7){
            $post->view_monthly = 0;
            $post->last_reset_monthly = $now;
        }

        $stats->save();
        $post->save();
    }
}

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home(){
        resetView();
        return view('landing.index', [
            'faqs' => faq::all(),
            'kata_merekas' => ApaKataMereka::all(),
            'carousel_items' => Post::where('show', 1)->orderBy('view_monthly', 'DESC')->limit(10)->get(),
            'newest' => Post::where('show', 1)->orderBy('id', 'DESC')->limit(5)->get(),
            'populars' => Post::where('show', 1)->orderBy('view_monthly', 'DESC')->limit(5)->get(),
            'trendings' => Post::where('show', 1)->orderBy('view_weekly', 'DESC')->limit(4)->get(),
            'others' => Post::where('show', 1)->paginate(9),
        ]);
    }
    public function berita(){
        resetView();
        return view('landing.berita', [
            'categories' => category::all(),
            'carousel_items' => Post::where('show', 1)->limit(10)->get(),
            'newest' => Post::where('show', 1)->orderBy('id', 'DESC')->limit(5)->get(),
            'populars' => Post::where('show', 1)->orderBy('view_monthly', 'DESC')->limit(5)->get(),
            'trendings' => Post::where('show', 1)->orderBy('view_weekly', 'DESC')->limit(5)->get(),
            'others' => Post::where('show', 1)->paginate(9),
        ]);
    }
    public function beritaCategory($slug){
        resetView();
        $category = Category::where('slug', $slug)->first();
        if($category){
            
            return view('landing.berita', [
                'categories' => category::all(),
                'carousel_items' => Post::where('category_id', $category->id)->where('show', 1)->limit(10)->get(),
                'newest' => Post::where('category_id', $category->id)->where('show', 1)->orderBy('id', 'DESC')->limit(5)->get(),
                'populars' => Post::where('category_id', $category->id)->where('show', 1)->orderBy('view_monthly', 'DESC')->limit(5)->get(),
                'trendings' => Post::where('category_id', $category->id)->where('show', 1)->orderBy('view_weekly', 'DESC')->limit(5)->get(),
                'others' => Post::where('category_id', $category->id)->where('show', 1)->paginate(9),
                'selected_category' => $category
            ]);
        }
        return redirect('berita');
    }
    public function beritaTag($slug){
        resetView();
        $tagname = tagname::where('slug', $slug)->first();
        if($tagname){
            $tag = tag::where('tagname_id', $tagname->id)->with(['post'])->get();
            
            return view('landing.berita', [
                'categories' => category::all(),
                'carousel_items' => $tag->post->orderBy('id', 'DESC')->where('show', 1)->limit(10)->get(),
                'newest' => $tag->post->orderBy('id', 'DESC')->limit(5)->get(),
                'populars' => $tag->post->orderBy('view_monthly', 'DESC')->limit(5)->get(),
                'trendings' => $tag->post->orderBy('view_weekly', 'DESC')->limit(5)->get(),
                'others' => $tag->post->where('show', 1)->paginate(9),
                'selected_tag' => $tag,
            ]);
        }
        return redirect('berita');
    }
    public function beritaDetail($slug){
        resetView();
        $post = Post::where('show', 1)->where('slug', $slug)->first();
        if($post){
            $post->view_total = $post->view_total + 1;
            $post->view_monthly = $post->view_monthly + 1;
            $post->view_weekly = $post->view_weekly + 1;
            $post->view_daily = $post->view_daily + 1;
            $post->timestamps = false;
            $post->save();
            return view('landing.detail-berita', [
                'post' => $post,
                'hots' => Post::with(['contents'])->orderBy('view_weekly', 'DESC')->paginate(5)
            ]);
        }
        return redirect('berita');
    }

    public function read()
    {
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.berita.read', [
            'posts' => Post::orderBy('id', 'DESC')->get(),
            'tags' => tag::all(),
        ]);
    }
    public function createView()
    {
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.berita.create', [
            'categories' => Category::all(),
        ]);
    }
    public function readDetail($id)
    {
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        $post = Post::where('id', $id)->first();
        // $tagPost = tag::where('post_id', $post->id)->get();
        // foreach($tagPost <= )
        return view('member.berita.detail', [
            'post' => $post,
            'tags' => tagname::all(),
            'postcontents' => postcontent::where('post_id', $post->id)->where('post_type', 'photo')->get(),
            'postTags' => tag::with(['tagname'])->where('post_id', $post->id)->where('post_type', 'photo')->get(),
            'post_id' => $id,
        ]);
    }
    public function create(Request $request)
    {
        resetView();
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
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.berita.update', [
            'categories' => Category::all(),
            'post' => Post::where('id', $id)->first(),
        ]);
    }
    public function update(Request $request)
    {
        resetView();
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

    public function delete($id)
    {
        resetView();        
        if(Auth::user()->role != '1') return redirect('/');
        $post = Post::where('id', $id)->first();
        if(Auth::user()->id != $post->user_id) return redirect(route('member.berita'));
        foreach(postcontent::where('post_id', $post->id)->where('post_type', 'photo')->get() as $pc){
            $pc->delete();
        }
        foreach(tag::where('post_id', $post->id)->where('post_type', 'photo')->get() as $pc){
            $pc->delete();
        }
        $destinationPath = public_path().'\uploads\post\image';
        $imageName = $destinationPath.'\\'.$post->banner;
        File::delete($imageName);
        $post->delete();
        return redirect(route('member.berita'));
    }

    public function checkSlug(Request $request){
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function publish($id, Request $request){
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        $post = Post::where('id', $id)->first();
        if($post->user_id != Auth::user()->id) return redirect(route('member.berita'));
        $post->show=1;
        $post->save();
        if($request->source == 'detail') return redirect(route('member.berita.detail', ['id' => $post->id]));
        return redirect(route('member.berita'));
    }
    public function unpublish($id, Request $request){
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        $post = Post::where('id', $id)->first();
        if($post->user_id != Auth::user()->id) return redirect(route('member.berita'));
        $post->show=0;
        $post->save();
        if($request->source == 'detail') return redirect(route('member.berita.detail', ['id' => $post->id]));
        return redirect(route('member.berita'));
    }

    public function newSection(Request $request){
        resetView();
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
