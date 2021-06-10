<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\PostsRepositoryInterface;
use Illuminate\Support\Str;

class PostsRepository implements PostsRepositoryInterface
{
    public function all()
    {
        return Post::orderBy('updated_at', 'desc')
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
        $slug = Str::of($request->input('title'))->ascii()->slug('-');

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

    public function update($request, $id)
    {
        $hasFile = $request->hasFile('image');
        $imageFullName = '';
        $slug = Str::of($request->input('title'))->ascii()->slug('-');

        if ($hasFile) {
            $imageFullName = $request
                ->file('image')
                ->getClientOriginalName();

            $request->file('image')
                ->storeAs('images', $imageFullName, 'public');
        }
        
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->message = $request->input('message');
        $post->image = $imageFullName;
        $post->alt = $request->input('alt');
        $post->slug = $slug;
        $post->category_id = 0;

        $post->save();

        return $post;
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
    }

    /**
     * Removes all records from the database associated with the model.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyAll()
    {
        Post::truncate();
    }
}