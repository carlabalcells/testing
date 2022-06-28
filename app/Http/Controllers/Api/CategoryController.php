<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(Category::paginate(10));
    }

    public function all()
    {
        return response()->json(Category::get());
    }

    public function store(StoreRequest $request)
    {
        return response()->json(Category::create($request->validated()));
    }

    public function show(Category $category)
    {
        return response()->json($category);
    }

    public function update(StoreRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response()->json($category);
    }

    public function destroy(Category $category)
    {
        return response()->json($category->delete());
    }

    public function slug(Category $category)
    {
        //$category = Category::where("slug",$slug)->firstOrFail();
        return response()->json($category);
    }

    public function posts(Category $category)
    {
        //QueryBuilder
        /*
        $posts = Post::join('categories', "categories.id", "=", "posts.category_id")
            ->select("posts.*", "categories.name as category")
            ->where("categories.id", $category->id)
            ->get(); 
            //->toSql();
        */

        //Eloquent
        $posts = Post::with("category")
            ->where("category_id", $category->id)
            ->get();

        return response()->json($posts);
    }
}
