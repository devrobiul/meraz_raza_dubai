<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Attribute;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index($type){
        return view('admin.pages.post.index',[
            'posts'=>Post::type($type)->latest()->get(),
            'type'=> $type,
        ]);
    }
    public function create($type){
        return view('admin.pages.post.create',[
            'categories'=>Attribute::type('category')->orderBy('name','asc')->get(),
            'type' => $type,
            'post' => null,
        ]);
    }

    public function store(PostStoreRequest $request,$type){


        $metadata = [
            'icon' => $request->icon ?? 'n/a',
            'link' => $request->link ?? 'n/a',
            'short_description' => $request->short_description ?? 'n/a',
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
            'r_name' => $request->r_name ?? 'n/a',
            'r_deg' => $request->r_deg ?? 'n/a',
            'meta_keyword' => $request->meta_keyword,
            'award_org' => $request->award_org ?? 'n/a',
            'award_year' => $request->award_year ?? 'n/a',
        ];

        $post               =  new Post();
        $post->image        =  uploadFile($request->file('image'));
        $post->user_id      =  Auth::id();
        $post->title        =  $request->title;
        $post->type         =  $type;
        $post->slug         =  Str::slug($request->title);
        $post->description  =  $request->description;
        $post->attribute_id =  $request->attribute_id;
        $post->meta         =  json_encode($metadata);
        $post->created_at   = now();
        $post->save();
        flash()->success(ucfirst($post->type). ' created successfully');
        return redirect()->route('admin.post.index',$post->type);
    }


public function edit($id){
            $post=Post::findOrFail($id);
            $meta = json_decode($post->meta,true);
        return view('admin.pages.post.edit',[
            'categories'=>Attribute::type('category')->orderBy('name','asc')->get(),
            'post' => $post,
            'meta' => $meta,

        ]);
    }
    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id); 


        if ($request->hasFile('image')) {
            if ($post->image && file_exists(public_path($post->image))) {
                unlink(public_path($post->image));
            }

            $post->image = uploadFile($request->file('image'));
        }


        $metadata = [
            'icon' => $request->icon ?? 'n/a',
            'link' => $request->link ?? 'n/a',
            'short_description' => $request->short_description ?? 'n/a',
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
            'r_name' => $request->r_name ?? 'n/a',
            'r_deg' => $request->r_deg ?? 'n/a',
            'meta_keyword' => $request->meta_keyword,
            'award_org' => $request->award_org ?? 'n/a',
            'award_year' => $request->award_year ?? 'n/a',
        ];


        $post->title        = $request->title;
        $post->user_id      = Auth::id();
        $post->slug         = Str::slug($request->title);
        $post->description  = $request->description;
        $post->attribute_id = $request->attribute_id;
        $post->meta         = json_encode($metadata);
        $post->updated_at   = now();
        $post->save();

        flash()->success(ucfirst($post->type) . ' updated successfully');
        return redirect()->route('admin.post.index', $post->type);
    }



    public function destroy($id){
        
        $post =  Post::findOrFail($id);
            if($post->image&&file_exists($post->image)){
                unlink(public_path($post->image));
            }

        $post->delete();
        flash()->success(ucfirst($post->type) .'deleted successfully');
        return redirect()->route('admin.post.index',$post->type);
    }
}
