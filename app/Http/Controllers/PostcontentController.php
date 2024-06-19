<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatepostcontentRequest;
use App\Http\Requests\StorepostcontentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\postcontent;
use App\Models\category;
use App\Models\tagname;
use App\Models\Post;
use App\Models\tag;
use Illuminate\Support\Facades\File; 

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
    if($link != null){
        $url = parse_url($link);
        $segments = explode('/', $url['path']);
        if     ($url['host'] == 'youtu.be') $code = $segments[1];
        else if($segments[1] == 'shorts')   $code = $segments[2];
        else if($segments[1] == 'watch')    $code = GET($link, 'v');
    }

    return $code;
}

class PostcontentController extends Controller
{
    public function save(Request $request){
        if(Auth::user()->role != '1') return redirect('/');
        $postcontent = postcontent::where('id', $request->postcontent_id)->first();
        if($postcontent->type == 'text'){
            $postcontent->content = $request->content;
        }
        else if($postcontent->type == 'image'){
            if($request->image){                
                $destinationPath = 'uploads/post/image';
                $imageName = 'postcontent'.$postcontent->id.'.'.$request->image->extension();
                $request->image->move(public_path($destinationPath), $imageName);
                $postcontent->content = $imageName;
            }
            $postcontent->image_width = $request->image_width;
            $postcontent->image_height = $request->image_height;
            $postcontent->href = $request->href;
            $postcontent->source = $request->source;
        }
        else if($postcontent->type == 'video'){
            $postcontent->content = getVideoCode($request->content);
            $postcontent->source = $request->source;
        }
        $postcontent->saved=1;
        $postcontent->save();
        if($postcontent->post_type == 'video'){
            return redirect(route('member.video.detail', ['id' => $postcontent->post_id]));
        }
        else{
            return redirect(route('member.berita.detail', ['id' => $postcontent->post_id]));
        }
    }
    public function edit(Request $request){
        if(Auth::user()->role != '1') return redirect('/');
        $postcontent = postcontent::where('id', $request->postcontent_id)->first();
        $postcontent->saved=0;
        $postcontent->save();
        if($postcontent->post_type == 'video'){
            return redirect(route('member.video.detail', ['id' => $postcontent->post_id]));
        }
        else{
            return redirect(route('member.berita.detail', ['id' => $postcontent->post_id]));
        }
    }
    
    public function delete($id){
        if(Auth::user()->role != '1') return redirect('/');
        $postcontent = postcontent::where('id', $id)->first();
        $post_id = $postcontent->post_id;
        $post_type = $postcontent->post_type;
        if($postcontent->type == 'image'){
            $destinationPath = public_path().'\uploads\post\image';
            $imageName = $destinationPath.'\\'.$postcontent->content;
            File::delete($imageName);
        }
        $postcontent->delete();
        if($post_type == 'video'){
            return redirect(route('member.video.detail', ['id' => $post_id]));
        }
        else{
            return redirect(route('member.berita.detail', ['id' => $post_id]));
        }
    }
}
