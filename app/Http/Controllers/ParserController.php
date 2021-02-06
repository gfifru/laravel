<?php

namespace App\Http\Controllers;

use App\Jobs\JobNewsParsing;
use App\Models\Source;
use App\Services\ParsingService;
use Illuminate\Http\RedirectResponse;

class ParserController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        $sources = Source::all();
        foreach ($sources as $source) {
            JobNewsParsing::dispatch(new ParsingService($source->url));
        }
        return redirect()
                ->route('admin.sources.index')
                ->with('success', 'Загрузка новостей успешно началась!');
    }
}
