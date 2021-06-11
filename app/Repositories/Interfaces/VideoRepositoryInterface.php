<?php

namespace App\Repositories\Interfaces;

interface VideoRepositoryInterface
{
    public function all();

    public function show($slug);

    public function store($request);

    public function update($request, $id);

    public function destroy($id);
    
    public function destroyAll();
}