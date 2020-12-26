<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * @return string
     */
    public function index(): string
    {
        return 'List categories';
    }

    /**
     * @return string
     */
    public function create(): string
    {
        return 'Create categories';
    }

    /**
     * @param int $id
     * @return string
     *
     */
    public function edit(int $id): string
    {
        return "Edit categories {$id}";
    }
}
