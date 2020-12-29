<?php

namespace App\Http\Controllers\News\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $posts = $this->news;
        return view('admin.news.posts.index', compact('posts'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.news.posts.create');
    }

    /**
     * @param int $id
     * @return string
     */
    public function edit(int $id)
    {
        return "Edit categories {$id}";
    }
}
