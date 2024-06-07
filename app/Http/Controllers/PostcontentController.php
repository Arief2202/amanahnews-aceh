<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatepostcontentRequest;
use App\Http\Requests\StorepostcontentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Postcontent;
use App\Models\category;
use App\Models\tagname;
use App\Models\Post;
use App\Models\tag;
use Illuminate\Support\Facades\File; 

class PostcontentController extends Controller
{
    public function save(Request $request){
        $postcontent = Postcontent::where('id', $request->postcontent_id)->first();
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
        $postcontent->saved=1;
        $postcontent->save();
        return redirect(route('member.berita.detail', ['id' => $postcontent->post_id]));
    }
    public function edit(Request $request){
        $postcontent = Postcontent::where('id', $request->postcontent_id)->first();
        $postcontent->saved=0;
        $postcontent->save();
        return redirect(route('member.berita.detail', ['id' => $postcontent->post_id]));
    }
    
    public function delete($id){
        $postcontent = Postcontent::where('id', $id)->first();
        $post_id = $postcontent->post_id;
        $destinationPath = public_path().'\uploads\post\image';
        $imageName = $destinationPath.'\\'.$postcontent->content;
        File::delete($imageName);
        $postcontent->delete();
        return redirect(route('member.berita.detail', ['id' => $post_id]));
    }
}
