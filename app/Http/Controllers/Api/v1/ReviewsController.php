<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewsRequest;
use App\Repositories\Interfaces\ReviewsRepositoryInterface;

class ReviewsController extends Controller
{
    private $reviewsRepository;

    public function __construct(ReviewsRepositoryInterface $reviewsRepository)
    {
        $this->reviewsRepository = $reviewsRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getReviews()
    {
        $reviews = $this->reviewsRepository->all();

        if ($reviews === null) {
            return response()->json([
                'status' => false,
                'message' => 'Отзывы не найдены'
            ])->setStatusCode(404);
        }

        return view('pages.reviews')->with('reviews', $reviews);
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
    public function createReview(ReviewsRequest $request)
    {
        $reviews = $this->reviewsRepository->store($request);

        return response()->json([
            'status' => true,
            'message' => 'Отзыв успеншно создан!',
            'reviews' => $reviews
        ])->setStatusCode(200);
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
    public function updateReview(ReviewsRequest $request, $id)
    {
        $reviews = $this->reviewsRepository->update($request, $id);

        return response()->json([
            'status' => true,
            'message' => 'Отзыв успешно обновлен!',
            'post' => $reviews
        ])->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeReview($id)
    {
        $this->reviewsRepository->destroy($id);

        return response()->json([
            'status' => true,
            'message' => 'Отзыв успешно удален!',
        ])->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function removeAllReviews()
    {
        $this->reviewsRepository->destroyAll();

        return response()->json([
            'status' => true,
            'message' => 'Все отзывы удалены!',
        ])->setStatusCode(200);
    }
}
