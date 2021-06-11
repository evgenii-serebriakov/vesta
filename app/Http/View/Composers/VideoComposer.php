<?php

namespace App\Http\View\Composers;

use App\Repositories\Interfaces\VideoRepositoryInterface;
use Illuminate\View\View;

class VideoComposer
{
    protected $videoRepository;

    public function __construct(VideoRepositoryInterface $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    /**
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $videos = $this->videoRepository->all();

        $view->with('videos', $videos);
    }
}