<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    function __construct() {
        $this->categories = [
            [
                'created_at' => '2001-03-10 17:16:18',
                'updated_at' => '2001-03-10 17:16:18',
                'parent_id' => 0,
                'title' => 'Массаж',
                'icon' => '#icon-arrow',
                'slug' => 'mass'
            ],
            [
                'created_at' => '2001-03-11 17:16:18',
                'updated_at' => '2001-03-11 17:16:18',
                'parent_id' => 0,
                'title' => 'Здоровье',
                'icon' => '#icon-arrow',
                'slug' => 'health'
            ],
            [
                'created_at' => '2001-03-12 17:16:18',
                'updated_at' => '2001-03-12 17:16:18',
                'parent_id' => 0,
                'title' => 'Семья',
                'icon' => '#icon-arrow',
                'slug' => 'family'
            ]
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->categories as $key => $category):
            DB::table('categories')->insert([
                'title' => $category['title'],
                'icon' => $category['icon'],
                'slug' => $category['slug'],
                'parent_id' => $category['parent_id'],
                'created_at' => $category['created_at'],
                'updated_at' => $category['updated_at']
            ]);
        endforeach;
    }
}
