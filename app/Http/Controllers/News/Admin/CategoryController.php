<?php

namespace App\Http\Controllers\News\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\NewsCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $categories = NewsCategory::all();
        return view('admin.news.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('admin.news.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryCreateRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryCreateRequest $request)
    {
        $data = $request->all();
        $data['slug']= Str::slug($data['title']);

        $post = NewsCategory::create($data);

        if ($post) {
            return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Категория сохранена!');
        } else {
            redirect()->back()->withErrors(['msg' => "Ошибка сохранения!"])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function edit(int $id)
    {
        $category = NewsCategory::findOrFail($id);
        return view('admin.news.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(CategoryUpdateRequest $request, int $id): RedirectResponse
    {
        $category = NewsCategory::find($id);
        $data = $request->only('title', 'slug', 'description');
//        $data['slug']= Str::slug($data['title']);

        $status = $category->update($data);

        if ($status) {
            return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Категория обновлена!');
        }else {
            redirect()->back()->withErrors(['msg' => "Ошибка сохранения!"])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $result = NewsCategory::destroy($id);
        if ($result) {
            return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Категория удалена!');
        }

        redirect()->back()->withInput();
    }
}
