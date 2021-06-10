<?php

namespace App\Repositories\Interfaces;

interface PostsRepositoryInterface
{
    public function all();

    public function show($slug);

    public function store($request);

    public function update($request, $id);

    public function destroy($id);
    
    public function destroyAll();
}