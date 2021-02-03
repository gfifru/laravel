<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use XmlParser;

class ParserController extends Controller
{
    public function index()
    {
        $load = XmlParser::load('http://news.yandex.ru/music.rss');
        $data = $load->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]
        ]);

        // вырезаем не нужный текст / создаем категорию
        $categoryTitle = Str::of($data['title'])->after('Яндекс.Новости: ');

        $category = NewsCategory::create([
            'title' => $categoryTitle,
            'slug' => Str::slug($data['title']),
            'description' => $data['description'],
        ]);

        // получаем id категории
        $categoryId = $category->id;

        // создаем массив новостей с нужными полями
        $posts = [];

        foreach ($data['news'] as $post) {
            $posts[] = [
                'category_id' => $categoryId,
                'title' => $post['title'],
                'slug' => Str::slug($post['title']),
                'description' => $post['description']
            ];
        }

        // вставляем в базу новости
        DB::table('news')->insert($posts);

        if ($category) {
            return redirect()
                ->route('admin.categories.index')
                ->with('success', 'Категория сохранена!');
        } else {
            redirect()->back()->withErrors(['msg' => "Ошибка сохранения!"])->withInput();
        }
    }
}
