<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ApaKataMereka;
use App\Models\StatisticsView;
use App\Models\postcontent;
use App\Models\category;
use App\Models\tagname;
use App\Models\Foto;
use App\Models\tag;
use App\Models\faq;
use App\Models\Iklan;
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
    $posts = Foto::where('last_reset_daily', '<', date('Y-m-d')." 00:00:00")->get();
    foreach($posts as $post){
        $post->timestamps = false;
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

function paginate($collection, $perpage){
    $arr = 0;
    $outputs = [];
    $page = request('page') ? request('page') : 1;
    $totalPage = ($collection->count()/$perpage > (int)($collection->count()/$perpage)) ? ((int)($collection->count()/$perpage)) + 1 : ((int) ($collection->count()/$perpage));
    foreach($collection as $col){
        if($arr >= $perpage*$page-$perpage) $outputs[] = $col;
        $arr++;
        if($arr >= $perpage*$page) break;
    }
    $collections = [
        'currentPage' => $page,
        'item_per_page' => $perpage,
        'total_item' => $collection->count(),
        'total_page' => $totalPage,
        'lastPage' => $totalPage,
        'items' => $outputs
    ];
    return $collections;
}

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home(){
        resetView();
        return view('landing.index', [
            'faqs' => faq::all(),
            'kata_merekas' => ApaKataMereka::all(),
            'carousel_items' => Foto::where('show', 1)->orderBy('view_monthly', 'DESC')->limit(10)->get(),
            'newest' => Foto::where('show', 1)->orderBy('id', 'DESC')->limit(5)->get(),
            'populars' => Foto::where('show', 1)->orderBy('view_monthly', 'DESC')->limit(5)->get(),
            'trendings' => Foto::where('show', 1)->orderBy('view_weekly', 'DESC')->limit(4)->get(),
            'others' => Foto::where('show', 1)->paginate(9),
        ]);
    }
    public function foto(){
        resetView();
        $search = [];
        if(request('search')){
            $posts =  Foto::latest()->where('title', 'like', '%'.request('search').'%')->orwhere('content', 'like', '%'.request('search').'%')->get();
            $posts2 = postcontent::latest()->where('content', 'like', '%'.request('search').'%')->orwhere('source', 'like', '%'.request('search').'%');
            $posts2 = $posts2->where('post_type', 'text')->with(['foto'])->get();
            $search = [];
            $arr = 0;
            foreach($posts as $post){
                $search[$arr++] = $post;
            }
            foreach($posts2 as $post){
                if($posts->where('id', $post->post->id)->count() == 0){
                    $search[$arr++] = $post->post;
                }
            }
            $search = collect($search);
            $search = paginate($search, 5);
        }

        $showedFirst5 = Foto::where('show', 1)->orderBy('id', 'DESC')->limit(5)->pluck('id')->toArray();
        $others = Foto::where('show', 1)->whereNotIn('id', $showedFirst5)->orderBy('id', 'DESC')->paginate(9);
        if(request('page') > 1){
            $others = Foto::where('show', 1)->whereNotIn('id', $showedFirst5)->orderBy('id', 'DESC')->paginate(5);
        }
        return view('landing.foto', [
            'categories' => category::all(),
            'carousel_items' => Foto::where('show', 1)->orderBy('view_weekly', 'DESC')->limit(5)->get(),
            'newest' => Foto::where('show', 1)->orderBy('id', 'DESC')->limit(5)->get(),
            'populars' => Foto::where('show', 1)->orderBy('view_monthly', 'DESC')->limit(5)->get(),
            'trendings' => Foto::where('show', 1)->orderBy('view_weekly', 'DESC')->limit(5)->get(),
            'others' => $others,
            'search' => $search,
            'iklan' => Iklan::inRandomOrder()->where('type', 'persegi')->first()
        ]);
    }
    public function fotoCategory($slug){
        resetView();
        $category = Category::where('slug', $slug)->first();
        if($category){

            $showedFirst5 = Foto::where('show', 1)->orderBy('id', 'DESC')->limit(5)->pluck('id')->toArray();
            $others = Foto::where('category_id', $category->id)->whereNotIn('id', $showedFirst5)->where('show', 1)->orderBy('id', 'DESC')->paginate(9);
            if(request('page') > 1){
                $others = Foto::where('category_id', $category->id)->whereNotIn('id', $showedFirst5)->where('show', 1)->orderBy('id', 'DESC')->paginate(5);
            }

            return view('landing.foto', [
                'categories' => category::all(),
                'carousel_items' => Foto::where('category_id', $category->id)->where('show', 1)->orderBy('view_weekly', 'DESC')->limit(5)->get(),
                'newest' => Foto::where('category_id', $category->id)->where('show', 1)->orderBy('id', 'DESC')->limit(5)->get(),
                'populars' => Foto::where('category_id', $category->id)->where('show', 1)->orderBy('view_monthly', 'DESC')->limit(5)->get(),
                'trendings' => Foto::where('category_id', $category->id)->where('show', 1)->orderBy('view_weekly', 'DESC')->limit(5)->get(),
                'others' => $others,
                'selected_category' => $category,
                'iklan' => Iklan::inRandomOrder()->where('type', 'persegi')->first()
            ]);
        }
        return redirect('foto');
    }
    public function fotoTag($slug){
        resetView();
        $tagname = tagname::where('slug', $slug)->first();
        if($tagname){
            $tag = tag::where('tagname_id', $tagname->id);

            $tagOthers = $tag->with(['foto' => function($q){
                $q->where('show', '=', 1);
            }]);

            $others = $tagOthers->orderBy('id', 'DESC')->paginate(9);
            if(request('page') > 1){
                $others = $tagOthers->orderBy('id', 'DESC')->paginate(5);
            }

            return view('landing.foto', [
                'categories' => category::all(),
                'carousel_items' => $tag->with(['foto' => function($q){$q->where('show', '=', 1)->orderBy('view_weekly', 'DESC');}])->limit(5)->get()->pluck('foto'),
                'newest' => $tag->with(['foto' => function($q){$q->where('show', '=', 1)->orderBy('id', 'DESC');}])->limit(5)->get()->pluck('foto'),
                'populars' => $tag->with(['foto' => function($q){$q->where('show', '=', 1)->orderBy('view_monthly', 'DESC');}])->limit(5)->get()->pluck('foto'),
                'trendings' => $tag->with(['foto' => function($q){$q->where('show', '=', 1)->orderBy('view_weekly', 'DESC');}])->limit(5)->get()->pluck('foto'),
                'others' => $others,
                'selected_tag' => $tagname,
                'iklan' => Iklan::inRandomOrder()->where('type', 'persegi')->first()
            ]);
        }
        return redirect('berita');
    }
    public function fotoDetail($slug){
        resetView();
        $post = Foto::where('show', 1)->where('slug', $slug)->first();
        if($post){
            $post->view_total = $post->view_total + 1;
            $post->view_monthly = $post->view_monthly + 1;
            $post->view_weekly = $post->view_weekly + 1;
            $post->view_daily = $post->view_daily + 1;
            $post->timestamps = false;
            $post->save();
            return view('landing.detail-foto', [
                'post' => $post,
                'hots' => Foto::with(['contents'])->orderBy('view_weekly', 'DESC')->paginate(5),
                'iklan' => Iklan::inRandomOrder()->where('type', 'persegi')->first(),
                'others' => Foto::where('show', 1)->where('id', '!=', $post->id)->paginate(9),
            ]);
        }
        return redirect('foto');
    }

    public function read()
    {
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.foto.read', [
            'posts' => Foto::orderBy('id', 'DESC')->get(),
            'tags' => tag::all(),
        ]);
    }
    public function createView()
    {
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.foto.create', [
            'categories' => Category::all(),
        ]);
    }
    public function readDetail($id)
    {
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        $post = Foto::where('id', $id)->first();
        // $tagPost = tag::where('post_id', $post->id)->get();
        // foreach($tagPost <= )
        return view('member.foto.detail', [
            'post' => $post,
            'tags' => tagname::all(),
            'postcontents' => postcontent::where('post_id', $post->id)->where('post_type', 'foto')->get(),
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'image_source' => 'required',
            'title' => 'required',
            'slug' => 'required|unique:posts|max:255',
            'content' => 'required'
        ]);
        $destinationPath = 'uploads/foto/image';
        $imageName = $request->slug.'.'.$request->image->extension();
        $request->image->move(public_path($destinationPath), $imageName);
        $post = Foto::create([
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
        return redirect(route('member.foto.detail', ['id' => $post->id]));
    }

    public function updateView($id)
    {
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        return view('member.foto.update', [
            'categories' => Category::all(),
            'post' => Foto::where('id', $id)->first(),
        ]);
    }
    public function update(Request $request)
    {
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        $post = Foto::where('id', $request->id)->first();

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

            $destinationPath = 'uploads/foto/image';
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

        return redirect(route('member.foto.detail', ['id' => $post->id]));

    }

    public function delete($id)
    {
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        $post = Foto::where('id', $id)->first();
        if(Auth::user()->id != $post->user_id) return redirect(route('member.foto'));
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
        return redirect(route('member.foto'));
    }

    public function checkSlug(Request $request){
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        $slug = SlugService::createSlug(Foto::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function publish($id, Request $request){
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        $post = Foto::where('id', $id)->first();
        // if($post->user_id != Auth::user()->id) return redirect(route('member.foto'));
        $post->timestamps = false;
        $post->show=1;
        $post->save();
        if($request->source == 'detail') return redirect(route('member.foto.detail', ['id' => $post->id]));
        return redirect(route('member.foto'));
    }
    public function unpublish($id, Request $request){
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        $post = Foto::where('id', $id)->first();
        // if($post->user_id != Auth::user()->id) return redirect(route('member.foto'));
        $post->timestamps = false;
        $post->show=0;
        $post->save();
        if($request->source == 'detail') return redirect(route('member.foto.detail', ['id' => $post->id]));
        return redirect(route('member.foto'));
    }

    public function newSection(Request $request){
        resetView();
        if(Auth::user()->role != '1') return redirect('/');
        $request->validate([
            'post_id' => 'required',
            'type' => 'required',
        ]);
        $post = Foto::where('id', $request->post_id)->first();
        if(Auth::user()->id == $post->user_id){
            $postContent = postcontent::create([
                'post_id' => $request->post_id,
                'post_type' => 'foto',
                'type' => $request->type,
            ]);
        }
        return redirect(route('member.foto.detail', ['id' => $post->id]));
    }
}
