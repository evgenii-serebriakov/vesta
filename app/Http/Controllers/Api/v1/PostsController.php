<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Dotenv\Validator;
use App\Repositories\Interfaces\PostsRepositoryInterface;


class PostsController extends Controller
{
    private $postsRepository;

    public function __construct(PostsRepositoryInterface $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProducts()
    {
        $posts = $this->postsRepository->all();

        if (!$posts) {
            return response()->json([
                'status' => false,
                'message' => 'Посты не найдены'
            ])->setStatusCode(404);
        }

        return view('pages.posts')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo __METHOD__;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createProduct(PostRequest $request)
    {
        $post = $this->postsRepository->store($request);

        return response()->json([
            'status' => true,
            'message' => 'Пост успешно создан!',
            'post' => $post
        ])->setStatusCode(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getProduct($slug)
    {   
        $post = $this->postsRepository->show($slug);

        if (!$post) {
            return response()->json([
                'status' => false,
                'message' => 'Пост не найден'
            ])->setStatusCode(404);
        }


        return view('pages.single-post')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hasFile = $request->hasFile('image');
        $imageFullName = '';

        if ($hasFile) {
            $imageFullName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images', $imageFullName, 'public');
        }
        
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->message = $request->input('message');
        $post->image = $imageFullName;
        $post->alt = $request->input('alt');
        $post->slug = $request->input('slug');

        $post->update();

        return response()->json([
            'status' => true,
            'message' => 'Пост успешно обновлен!',
            'post' => $post
        ])->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post = delete();

        return response()->json([
            'status' => true,
            'message' => 'Пост успешно удален!',
        ])->setStatusCode(200);
    }
}
