<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class NewsCategory extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function getAllCategories(): array
    {
        return DB::table($this->table)->get()->toArray();
    }

    public function getOneCategories($id)
    {
        return DB::table($this->table)->find($id);
    }
}
