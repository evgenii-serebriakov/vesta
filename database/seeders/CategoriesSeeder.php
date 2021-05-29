<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    function __construct() {
        $this->categories = [
            ['parent_id' => 0, 'title' => 'Массаж', 'icon' => '#icon-arrow', 'slug' => 'massage'],
            ['parent_id' => 0, 'title' => 'Здоровье', 'icon' => '#icon-arrow', 'slug' => 'health'],
            ['parent_id' => 0, 'title' => 'Семья', 'icon' => '#icon-arrow', 'slug' => 'family'],
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
            ]);
        endforeach;
    }
}
