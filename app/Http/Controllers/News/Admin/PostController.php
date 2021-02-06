<?php

namespace App\Http\Controllers\News\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Models\NewsCategory;
use App\Models\NewsPost;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $posts = NewsPost::with('category')
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view('admin.news.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $categories = NewsCategory::select('id', 'title')->get();
        return view('admin.news.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostCreateRequest $request
     * @return RedirectResponse
     */
    public function store(PostCreateRequest $request): RedirectResponse
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['title']);

        if ($request->has('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = Str::slug($file->getClientOriginalName());
            $data['image'] = $file->storeAs('posts', $fileName . '.' . $ext);
        }

        $post = NewsPost::create($data);

        if ($post) {
            return redirect()
                ->route('admin.post.index')
                ->with('success', 'Пост сохранен!');
        }

        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id)
    {
        dd(__METHOD__, $id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|void
     */
    public function edit(int $id)
    {
        $post = NewsPost::findOrFail($id);
        $categories = NewsCategory::select('id', 'title')->get();
        return view('admin.news.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostCreateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(PostCreateRequest $request, int $id)
    {
        $post = NewsPost::find($id);
        $data = $request->only('title', 'category_id', 'description');
        $data['slug']= Str::slug($data['title']);

        $status = $post->update($data);

        if ($status) {
            return redirect()
                ->route('admin.post.index')
                ->with('success', 'Пост обновлен!');
        }

        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $result = NewsPost::destroy($id);
        if ($result) {
            return redirect()
                ->route('admin.post.index')
                ->with('success', 'Пост удален!');
        }

        return redirect()->back()->withInput();
    }
}
