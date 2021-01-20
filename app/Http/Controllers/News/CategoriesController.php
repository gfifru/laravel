<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use App\Models\NewsPost;

class CategoriesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = (new NewsCategory())->getAllCategories();
        return view('news.categories.index', compact('categories'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
//        if (isset($this->categories[$id])) {
//            $category = $this->categories[$id];
//        }
//
//        $news = $this->news;
//
//        $category_id = $id;
//
//        $map =  array_map(function($news) use($category_id) {
//            if($news['category_id'] === $category_id) return $news;
//        }, $news);
//
//        $response = array_filter($map, function($element) {
//            return !empty($element);
//        });


    }
}
