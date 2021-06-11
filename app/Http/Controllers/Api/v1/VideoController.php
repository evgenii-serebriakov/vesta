<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Repositories\Interfaces\VideoRepositoryInterface;

class VideoController extends Controller
{
    private $videoRepository;

    public function __construct(VideoRepositoryInterface $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getVideos()
    {
        $videos = $this->videoRepository->all();

        if (! $videos) {
            return response()->json([
                'status' => false,
                'message' => 'Видео не найдены'
            ])->setStatusCode(404);
        }

        return view('pages.videos')->with('videos', $videos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createVideo(VideoRequest $request)
    {
        $video = $this->videoRepository->store($request);

        return response()->json([
            'status' => true,
            'message' => 'Видео успеншно создано!',
            'video' => $video
        ])->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getVideo($slug)
    {
        $video = $this->videoRepository->show($slug);

        if (! $video) {
            return response()->json([
                'status' => false,
                'message' => 'Видео не найдено'
            ])->setStatusCode(404);
        }

        return view('pages.single-video')->with('video', $video);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateVideo(VideoRequest $request, $id)
    {
        $video = $this->videoRepository->update($request, $id);

        return response()->json([
            'status' => true,
            'message' => 'Видео успешно обновлено!',
            'post' => $video
        ])->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeVideo($id)
    {
        $this->videoRepository->destroy($id);

        return response()->json([
            'status' => true,
            'message' => 'Видео успешно удалено!',
        ])->setStatusCode(200);
    }

    /**
     * Removes all records from the database associated with the model.
     *
     * @return \Illuminate\Http\Response
     */
    public function removeAllVideos()
    {
        $this->videoRepository->destroyAll();

        return response()->json([
            'status' => true,
            'message' => 'Все видео удалены!',
        ])->setStatusCode(200);
    }
}
