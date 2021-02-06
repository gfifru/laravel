<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            $this->getData()
        );
    }

    private function getData(): array
    {
        $faker = Factory::create('ru_RU');

        $data = [];

        for ($i = 0; $i < 5; $i++) {
            $title = $faker->sentence(mt_rand(3,10), true);
            $data[] = [
                'title' => $title,
                'slug' => Str::slug($title),
                'description' => $faker->realText(mt_rand(180,220))
            ];
        }

        return $data;
    }
}
