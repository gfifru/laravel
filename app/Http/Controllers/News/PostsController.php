<?php

namespace App\Http\Controllers\News;

use App\Events\PostViewCounter;
use App\Http\Controllers\Controller;
use App\Models\NewsPost;

class PostsController extends Controller
{


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $post = NewsPost::find($id);
        event(new PostViewCounter($post));
        return view('news.posts.show', compact('post'));

    }


}
