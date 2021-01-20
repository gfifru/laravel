<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;

class PostsController extends Controller
{


    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        if (isset($this->news[$id])) {
            $news = $this->news[$id];
        }
        return view('news.posts.show', compact('news'));

    }


}
