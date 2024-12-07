<?php

namespace App\Repositories;

use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogRepository implements IBlogRepository
{

    public function get()
    {
        $blogs = Blog::latest()->get();

        return BlogResource::collection($blogs);
       
    }

    public function show(Blog $blog){
        return new BlogResource($blog);
    }

    public function create(array $data){

        $blog = new Blog();
        $blog->user_id = Auth::user()->id;
        $blog->title = $data['title'];
        $blog->description = $data['description'];
        $blog->save();
       

        return new BlogResource($blog);

    }

    public function update(Blog $blog, array $data){

        $blog->title = $data['title'];
        $blog->description = $data['description'];
        $blog->save();

        return new BlogResource($blog);
    }

}
