<?php

namespace App\Repositories;

use App\Models\Reviews;
use App\Repositories\Interfaces\ReviewsRepositoryInterface;
use Illuminate\Support\Str;

class ReviewsRepository implements ReviewsRepositoryInterface
{
    public function all()
    {
        return Reviews::orderBy('id', 'desc')
            ->take(10)
            ->get();
    }

    public function store($request)
    {
        $hasFile = $request->hasFile('image');
        $imageFullName = '';

        if ($hasFile) {
            $imageFullName = $request
                ->file('image')
                ->getClientOriginalName();

            $request->file('image')
                ->storeAs('images', $imageFullName, 'public');
        }
        
        $reviews = new Reviews();
        $reviews->title = $request->input('title');
        $reviews->video = $request->input('video');
        $reviews->image = $imageFullName;
        $reviews->alt = $request->input('alt');

        $reviews->save();

        return $reviews;
    }

    public function update($request, $id)
    {
        $hasFile = $request->hasFile('image');
        $imageFullName = '';

        if ($hasFile) {
            $imageFullName = $request
                ->file('image')
                ->getClientOriginalName();

            $request->file('image')
                ->storeAs('images', $imageFullName, 'public');
        }
        
        $reviews = reviews::find($id);
        $reviews->title = $request->input('title');
        $reviews->video = $request->input('video');
        $reviews->image = $imageFullName;
        $reviews->alt = $request->input('alt');

        $reviews->save();

        return $reviews;
    }

    public function destroy($id)
    {
        Reviews::find($id)->delete();
    }

    /**
     * Removes all records from the database associated with the model.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyAll()
    {
        Reviews::truncate();
    }
}