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
}