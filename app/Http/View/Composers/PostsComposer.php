<?php

namespace App\Http\View\Composers;

use App\Repositories\Interfaces\PostsRepositoryInterface;
use Illuminate\View\View;

class PostsComposer
{
    protected $postsRepository;

    public function __construct(PostsRepositoryInterface $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    /**
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $posts = $this->postsRepository->all();

        $view->with('posts', $posts);
    }
}