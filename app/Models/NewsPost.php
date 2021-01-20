<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NewsPost extends Model
{
    use HasFactory;

    protected $table = 'news';

    /**
     * @return array
     */
    public function getAllNews(): array
    {
        return DB::table($this->table)
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select('news.*', 'categories.title as category_title')
            ->orderBy('id')
            ->get()
            ->toArray();
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Query\Builder|mixed
     */
    public function getOneNews($id)
    {
        return DB::table($this->table)->find($id);
    }
}
// Источник новостей
// id, title, url
