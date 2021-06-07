<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\PostRequest;

interface PostsRepositoryInterface
{
    public function all();

    public function show($slug);

    public function store($request);
}