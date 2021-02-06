<?php

namespace App\Http\Controllers\News\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SourceCreateRequest;
use App\Http\Requests\SourceUpdateRequest;
use App\Models\NewsPost;
use App\Models\Source;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $sources = Source::paginate(10);
        return view('admin.news.sources.index', compact('sources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('admin.news.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SourceCreateRequest $request
     * @return RedirectResponse
     */
    public function store(SourceCreateRequest $request): RedirectResponse
    {
        $data = $request->all();

        $source = Source::create($data);

        if ($source) {
            return redirect()
                ->route('admin.sources.index')
                ->with('success', 'Источник добавлен!');
        }

        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param Source $source
     * @return Response
     */
    public function show(Source $source)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Source $source
     * @return Application|Factory|View|Response
     */
    public function edit(Source $source)
    {
        return view('admin.news.sources.edit', compact('source'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SourceUpdateRequest $request
     * @param Source $source
     * @return RedirectResponse
     */
    public function update(SourceUpdateRequest $request, Source $source): RedirectResponse
    {
        $source->update($request->only('name', 'url'));
        return redirect()
            ->route('admin.sources.index')
            ->with('success', 'Источник изменен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Source $source
     * @return RedirectResponse
     */
    public function destroy(Source $source): RedirectResponse
    {
        $result = $source->delete();
        if ($result) {
            return redirect()
                ->route('admin.sources.index')
                ->with('success', 'Источник удален!');
        }

        return redirect()->back()->withInput();
    }
}
