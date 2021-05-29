<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavigationMenuSeeder extends Seeder
{
    function __construct() {
        $this->navigation = [
            ['parent_id' => 0, 'text' => 'Главная', 'icon' => '#icon-home', 'slug' => '/'],
            ['parent_id' => 0, 'text' => 'Видео', 'icon' => '#icon-camera', 'slug' => '/video'],
            ['parent_id' => 0, 'text' => 'Блог', 'icon' => '#icon-news', 'slug' => '/posts'],
            ['parent_id' => 0, 'text' => 'Отзывы', 'icon' => '#icon-comment', 'slug' => '/reviews']
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->navigation as $link):
            DB::table('navigation_menu')->insert([
                'text' => $link['text'],
                'icon' => $link['icon'],
                'slug' => $link['slug'],
                'parent_id' => $link['parent_id'],
            ]);
        endforeach;
    }
}
