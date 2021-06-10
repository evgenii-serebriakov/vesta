<?php

namespace App\Repositories\Interfaces;

interface ReviewsRepositoryInterface
{
    public function all();

    public function store($request);

    public function update($request, $id);

    public function destroy($id);
    
    public function destroyAll();
}