<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $categories = [
        [
            'id' => 0,
            'title' => 'Политика',
            'slug' => 'politika',
            'description' => "Категория про политику"
        ],
        [
            'id' => 1,
            'title' => 'Коронавирус',
            'slug' => 'koronovirus',
            'description' => "Категория про короновирус"
        ],
        [
            'id' => 2,
            'title' => 'Общество',
            'slug' => 'obshestvo',
            'description' => "Категория про общество"
        ],
        [
            'id' => 3,
            'title' => 'Экономика',
            'slug' => 'ekonomika',
            'description' => "Категория про экономику"
        ],
        [
            'id' => 4,
            'title' => 'Спорт',
            'slug' => 'sport',
            'description' => "Категория про спорт"
        ],
    ];

    protected $news = [
        [
            'category_id' => '0',
            'id' => 0,
            'title' => 'Новость 1',
            'slug' => 'news1',
            'text' => "Тут будет текст про новость 1"
        ],
        [
            'category_id' => '0',
            'id' => 1,
            'title' => 'Новость 2',
            'slug' => 'news2',
            'text' => "Тут будет текст про новость 2"
        ],[
            'category_id' => '1',
            'id' => 2,
            'title' => 'Новость 3',
            'slug' => 'news3',
            'text' => "Тут будет текст про новость 3"
        ],
        [
            'category_id' => '1',
            'id' => 3,
            'title' => 'Новость 4',
            'slug' => 'news4',
            'text' => "Тут будет текст про новость 4"
        ],
        [
            'category_id' => '2',
            'id' => 4,
            'title' => 'Новость 5',
            'slug' => 'news5',
            'text' => "Тут будет текст про новость 5"
        ],
        [
            'category_id' => '2',
            'id' => 5,
            'title' => 'Новость 6',
            'slug' => 'news6',
            'text' => "Тут будет текст про новость 6"
        ],
        [
            'category_id' => '2',
            'id' => 6,
            'title' => 'Новость 7',
            'slug' => 'news7',
            'text' => "Тут будет текст про новость 7"
        ],
        [
            'category_id' => '3',
            'id' => 7,
            'title' => 'Новость 8',
            'slug' => 'news8',
            'text' => "Тут будет текст про новость 8"
        ],
    ];
}
