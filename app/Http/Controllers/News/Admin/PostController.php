<?php

namespace App\Http\Controllers\News\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->news;
        return view('admin.news.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostCreateRequest $request)
    {
        session();
        $data = $request->only('title', 'slug', 'category_id', 'text');

        $saveFile = function (array $data) {
            $responseData = [];
            $fileNews = storage_path('app/posts.txt');
            if (file_exists($fileNews)) {
                $file = file_get_contents($fileNews);
                $response = json_decode($file, true);
            }
            $responseData[] = $data;
            if (isset($response) && (!empty($response))) {
                $r = array_merge($response, $responseData);
            } else {
                $r = $responseData;
            }
            file_put_contents($fileNews, json_encode($r));
        };

        $saveFile($data);

        session()->flash('success', 'Пост сохранен!');
        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        dd(__METHOD__, $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        dd(__METHOD__, $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostCreateRequest $request, int $id)
    {
        dd(__METHOD__, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        dd(__METHOD__, $id);
    }
}
