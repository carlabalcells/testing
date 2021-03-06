<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;

class PostController extends Controller
{
    public function index()
    {
        return response()->json(Post::with('category')->paginate(4));
    }

    public function all()
    {
        return response()->json(Post::get());
    }

    public function slug(Post $post){
        //$post = Post::with("category")->where("slug",$slug)->firstOrFail();
        $post->category;
        return response()->json($post);
    }
    
    public function store(StoreRequest $request)
    {
        return response()->json(Post::create($request->validated()));
    }

    public function show(Post $post)
    {
        return response()->json($post);
    }

    public function update(UpdateRequest $request, Post $post)
    {
        $post->update($request->validated());
        return response()->json($post);
    }

    public function upload(Request $request, Post $post){
        
        $data["image"] = $filename = time().'.'.$request['image']->extension();
        $request->image->move(public_path("image/otro"), $filename);        

        $post->update($data);
        return response()->json($post);
    }

    public function destroy(Post $post)
    {
        return response()->json($post->delete());
    }
}
