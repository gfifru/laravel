<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Arr;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = $this->categories;
        return view('categories.index', compact('categories'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $category = $this->categories["{$id}"];
        $news = $this->news;

        $category_id = $id;

        $map =  array_map(function($news) use($category_id) {
            if($news['category_id'] === $category_id) return $news;
        }, $news);

        $response = array_filter($map, function($element) {
            return !empty($element);
        });
        return view('categories.show', compact('category', 'response'));

    }
}
