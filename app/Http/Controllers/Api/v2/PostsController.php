<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Get posts from the database
     */
    public function getIndex()
    {
        echo __METHOD__;
    }
    
    /**
     * Create post
     */
    public function getCreate()
    {
        echo __METHOD__;
    }
}
