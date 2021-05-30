<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavigationMenuSeeder extends Seeder
{
    function __construct() {
        $this->navigation = [
            [ 
                'created_at' => '2001-03-10 17:16:18',
                'updated_at' => '2001-03-10 17:16:18',
                'parent_id' => 0, 'text' => 'Главная',
                'icon' => '#icon-home',
                'slug' => '/'
            ],
            [ 
                'created_at' => '2001-03-11 17:16:18',
                'updated_at' => '2001-03-11 17:16:18',
                'parent_id' => 0, 'text' => 'Видео',
                'icon' => '#icon-camera',
                'slug' => '/video'
            ],
            [ 
                'created_at' => '2001-03-12 17:16:18',
                'updated_at' => '2001-03-12 17:16:18',
                'parent_id' => 0, 'text' => 'Блог',
                'icon' => '#icon-news',
                'slug' => '/posts'
            ],
            [ 
                'created_at' => '2001-03-13 17:16:18',
                'updated_at' => '2001-03-13 17:16:18',
                'parent_id' => 0, 'text' => 'Отзывы',
                'icon' => '#icon-comment',
                'slug' => '/reviews'
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
        foreach ($this->navigation as $link):
            DB::table('navigation_menu')->insert([
                'text' => $link['text'],
                'icon' => $link['icon'],
                'slug' => $link['slug'],
                'parent_id' => $link['parent_id'],
                'created_at' => $link['created_at'],
                'updated_at' => $link['updated_at']
            ]);
        endforeach;
    }
}
