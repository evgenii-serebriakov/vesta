<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\PostsRepositoryInterface;

class PostsRepository implements PostsRepositoryInterface
{
    public function all()
    {
        return Post::orderBy('created_at', 'desc')
            ->take(10)
            ->get();
    }

    public function show($slug)
    {
        return Post::where('slug', $slug)->first();
    }
    
    public function store($request)
    {
        $hasFile = $request->hasFile('image');
        $imageFullName = '';
        $slug = strtolower($request->input('title'));

        if ($hasFile) {
            $imageFullName = $request
                ->file('image')
                ->getClientOriginalName();

            $request->file('image')
                ->storeAs('images', $imageFullName, 'public');
        }
        
        $post = new Post();
        $post->title = $request->input('title');
        $post->message = $request->input('message');
        $post->image = $imageFullName;
        $post->alt = $request->input('alt');
        $post->slug = $slug;
        $post->category_id = 0;

        $post->save();

        return $post;
    }
}