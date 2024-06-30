<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\StatisticsView;
use App\Models\postcontent;
use App\Models\category;
use App\Models\Iklan;
use App\Models\tagname;
use App\Models\PostVideo;
use App\Models\tag;
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
    $posts = PostVideo::where('last_reset_daily', '<', date('Y-m-d')." 00:00:00")->get();
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

function GET($link, $param){resetView();
    resetView();
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
    resetView();
    $code = null;
    if($link != null){
        $url = parse_url($link);
        $segments = explode('/', $url['path']);
        if     ($url['host'] == 'youtu.be') $code = $segments[1];
        else if($segments[1] == 'shorts')   $code = $segments[2];
        else if($segments[1] == 'watch')    $code = GET($link, 'v');
    }

    return $code;
}

class PostVideoController extends Controller
{
    public function berita(){
        resetView();
        return view('landing.video', [
            'categories' => category::all(),
            'carousel_items' => PostVideo::where('show', 1)->get(),
            'newest' => PostVideo::where('show', 1)->orderBy('id', 'DESC')->limit(5)->get(),
            'populars' => PostVideo::where('show', 1)->orderBy('view_monthly', 'DESC')->limit(5)->get(),
            'trendings' => PostVideo::where('show', 1)->orderBy('view_weekly', 'DESC')->limit(5)->get(),
            'others' => PostVideo::where('show', 1)->paginate(9),
            'iklan' => Iklan::inRandomOrder()->where('type', 'persegi')->first()
        ]);
    }
    public function beritaCategory($slug){
        resetView();
        $category = Category::where('slug', $slug)->first();
        if($category){
            
        return view('landing.video', [
            'categories' => category::all(),
            'carousel_items' => PostVideo::where('category_id', $category->id)->where('show', 1)->get(),
            'newest' => PostVideo::where('category_id', $category->id)->where('show', 1)->orderBy('id', 'DESC')->limit(5)->get(),
            'populars' => PostVideo::where('category_id', $category->id)->where('show', 1)->orderBy('view_monthly', 'DESC')->limit(5)->get(),
            'trendings' => PostVideo::where('category_id', $category->id)->where('show', 1)->orderBy('view_weekly', 'DESC')->limit(5)->get(),
            'others' => PostVideo::where('category_id', $category->id)->where('show', 1)->paginate(9),
            'selected_category' => $category,
            'iklan' => Iklan::inRandomOrder()->where('type', 'persegi')->first()
        ]);
        }
        return redirect('berita');
    }
    public function beritaTag($slug){
        resetView();
        $tagname = tagname::where('slug', $slug)->first();
        if($tagname){
            $tag = tag::where('tagname_id', $tagname->id)->with(['post'])->get();
            
            return view('landing.video', [
                'categories' => category::all(),
                'carousel_items' => $tag->post->where('show', 1)->get(),
                'newest' => $tag->post->where('show', 1)->orderBy('id', 'DESC')->limit(5)->get(),
                'populars' => $tag->post->where('show', 1)->orderBy('view_monthly', 'DESC')->limit(5)->get(),
                'trendings' => $tag->post->where('show', 1)->orderBy('view_weekly', 'DESC')->limit(5)->get(),
                'others' => $tag->post->where('show', 1)->paginate(9),
                'selected_tag' => $tag,
                'iklan' => Iklan::inRandomOrder()->where('type', 'persegi')->first()
            ]);
        }
        return redirect('berita');
    }
    public function beritaDetail($slug){
        resetView();
        $post = PostVideo::where('show', 1)->where('slug', $slug)->first();
        if($post){
            $post->view_total = $post->view_total + 1;
            $post->view_monthly = $post->view_monthly + 1;
            $post->view_weekly = $post->view_weekly + 1;
            $post->view_daily = $post->view_daily + 1;
            $post->timestamps = false;
            $post->save();
            return view('landing.detail-video', [
                'post' => $post,
                'tags' => tagname::all(),
                'hots' => PostVideo::with(['contents'])->orderBy('view_weekly', 'DESC')->paginate(5),
                'postcontents' => postcontent::where('post_id', $post->id)->where('post_type', 'video')->get(),
                'postTags' => tag::with(['tagname'])->where('post_id', $post->id)->where('post_type', 'video')->get(),
                'post_id' => $post->id,
                'iklan' => Iklan::inRandomOrder()->where('type', 'persegi')->first()
            ]);
        }
        return redirect('berita');
    }

    public function read()
    {
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.video.read', [
            'posts' => PostVideo::orderBy('id', 'DESC')->get(),
            'tags' => tag::all(),
        ]);
    }
    public function createView()
    {
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.video.create', [
            'categories' => Category::all(),
        ]);
    }
    public function readDetail($id)
    {
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        $post = PostVideo::where('id', $id)->first();
        // $tagPost = tag::where('post_id', $post->id)->get();
        // foreach($tagPost <= )
        return view('member.video.detail', [
            'post' => $post,
            'tags' => tagname::all(),
            'postcontents' => postcontent::where('post_id', $post->id)->where('post_type', 'video')->get(),
            'postTags' => tag::with(['tagname'])->where('post_id', $post->id)->get(),
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
            'video' => 'required',
            'video_source' => 'required',
            'title' => 'required',
            'slug' => 'required|unique:posts|max:255',
            'content' => 'required'
        ]);
        $destinationPath = 'uploads/video/image';
        $imageName = $request->slug.'.'.$request->image->extension();
        $request->image->move(public_path($destinationPath), $imageName);
        $post = PostVideo::create([
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'banner' => $imageName,
            'video' => getVideoCode($request->video),
            'video_source' => $request->video_source,
            'slug' => $request->slug,
            'content' => $request->content,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect(route('member.video.detail', ['id' => $post->id]));
    }
    
    public function updateView($id)
    {
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.video.update', [
            'categories' => Category::all(),
            'post' => PostVideo::where('id', $id)->first(),
        ]);
    }
    public function update(Request $request)
    {
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        $post = PostVideo::where('id', $request->id)->first();

        if($request->slug == $post->slug){
            $validated = $request->validate([
                'id' => 'required',
                'user_id' => 'required',
                'category_id' => 'required',
                'category' => 'required',
                'video' => 'required',
                'video_source' => 'required',
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
                'video' => 'required',
                'video_source' => 'required',
                'title' => 'required',
                'slug' => 'required|unique:posts|max:255',
                'content' => 'required'
            ]);
        }

        if($request->image){
            $destinationPath = public_path().'\uploads\video\image';
            $imageName = $destinationPath.'\\'.$post->banner;
            File::delete($imageName);

            $destinationPath = 'uploads/video/image';
            $imageName = $request->slug.'.'.$request->image->extension();
            $request->image->move(public_path($destinationPath), $imageName);
            $post->banner =  $imageName;
        }

        $post->user_id =  $request->user_id;
        $post->category_id =  $request->category_id;
        $post->title =  $request->title;
        $post->video =  getVideoCode($request->video);
        $post->video_source =  $request->video_source;
        $post->slug =  $request->slug;
        $post->content =  $request->content;
        $post->updated_at =  date('Y-m-d H:i:s');
        $post->save();

        return redirect(route('member.video.detail', ['id' => $post->id]));

    }

    public function delete($id)
    {
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        $post = PostVideo::where('id', $id)->first();
        if(Auth::user()->id != $post->user_id) return redirect(route('member.video'));
        foreach(postcontent::where('post_id', $post->id)->where('post_type', 'video')->get() as $pc){
            $pc->delete();
        }
        foreach(tag::where('post_id', $post->id)->where('post_type', 'video')->get() as $pc){
            $pc->delete();
        }
        $destinationPath = public_path().'\uploads\video\image';
        $imageName = $destinationPath.'\\'.$post->banner;
        File::delete($imageName);
        $post->delete();
        return redirect(route('member.video'));
    }

    public function checkSlug(Request $request){
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        $slug = SlugService::createSlug(PostVideo::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function publish($id, Request $request){
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        $post = PostVideo::where('id', $id)->first();
        if($post->user_id != Auth::user()->id) return redirect(route('member.video'));
        $post->show=1;
        $post->save();
        if($request->source == 'detail') return redirect(route('member.video.detail', ['id' => $post->id]));
        return redirect(route('member.video'));
    }
    public function unpublish($id, Request $request){
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        $post = PostVideo::where('id', $id)->first();
        if($post->user_id != Auth::user()->id) return redirect(route('member.video'));
        $post->show=0;
        $post->save();
        if($request->source == 'detail') return redirect(route('member.video.detail', ['id' => $post->id]));
        return redirect(route('member.video'));
    }

    public function newSection(Request $request){
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        $request->validate([
            'post_id' => 'required',
            'type' => 'required',
        ]);
        $post = PostVideo::where('id', $request->post_id)->first();
        if(Auth::user()->id == $post->user_id){
            $postContent = postcontent::create([
                'post_type' => $request->post_type,
                'post_id' => $request->post_id,
                'type' => $request->type,
            ]);
        }
        return redirect(route('member.video.detail', ['id' => $post->id]));
    }
    
}
