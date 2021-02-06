<?php


namespace App\Services;


use App\Models\NewsCategory;
use App\Models\NewsPost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravie\Parser\Document;
use XmlParser;

class ParsingService
{
    protected $url;

    /**
     * ParsingService constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * @return Document
     */
    protected function load(): Document
    {
        return XmlParser::load($this->url);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        $load = $this->load();

        return $load->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,link,guid,description,pubDate]']
        ]);
    }

    /**
     *
     */
    public function saveData()
    {
        $data = $this->getData();

        // вырезаем не нужный текст / создаем категорию
        $categoryTitle = Str::of($data['title'])->after('Яндекс.Новости: ');

        $category = NewsCategory::create([
            'title' => $categoryTitle,
            'slug' => Str::slug($data['title']),
            'description' => $data['description']
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
                'description' => $post['description'],
                'created_at' => $data['pubDate'],
            ];
        }

        // вставляем в базу новости
//        DB::table('news')->insert($posts);
        NewsPost::create($posts);

    }
}
