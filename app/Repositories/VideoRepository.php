<?php

namespace App\Repositories;

use App\Models\Video;
use App\Repositories\Interfaces\VideoRepositoryInterface;
use Illuminate\Support\Str;

class VideoRepository implements VideoRepositoryInterface
{
    public function all()
    {
        return Video::orderBy('updated_at', 'desc')
            ->take(10)
            ->get();
    }

    public function show($slug)
    {
        return Video::where('slug', $slug)->first();
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
        
        $video = new Video();
        $video->title = $request->input('title');
        $video->message = $request->input('message');
        $video->video = $request->input('video');
        $video->image = $imageFullName;
        $video->alt = $request->input('alt');
        $video->slug = $slug;
        $video->category_id = 0;

        $video->save();

        return $video;
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
        
        $video = Video::find($id);
        $video->title = $request->input('title');
        $video->message = $request->input('message');
        $video->video = $request->input('video');
        $video->image = $imageFullName;
        $video->alt = $request->input('alt');
        $video->slug = $slug;
        $video->category_id = 0;

        $video->save();

        return $video;
    }

    public function destroy($id)
    {
        Video::find($id)->delete();
    }

    /**
     * Removes all records from the database associated with the model.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyAll()
    {
        Video::truncate();
    }
}