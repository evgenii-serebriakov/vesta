<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{

    function __construct() {
        $this->posts = [
            [
                'created_at' => '2001-03-10 17:16:18',
                'updated_at' => '2001-03-10 17:16:18',
                'category_id' => 0,
                'image' => 'massage_0.jpg',
                'alt' => 'bg-1',
                'title' => 'Lorem, ipsum dolor',
                'slug' => 'lorem-ipsum-dolor',
                'message' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati dolor sit amet consectetur adipisicing.'
            ],
            [
                'created_at' => '2001-03-11 17:16:18',
                'updated_at' => '2001-03-11 17:16:18',
                'category_id' => 0,
                'image' => 'massage_1.jpeg',
                'alt' => 'bg-2',
                'title' => 'Lorem, ipsum dolor',
                'slug' => 'lorem-ipsum-dolor',
                'message' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati dolor sit amet consectetur adipisicing.'
            ],
            [
                'created_at' => '2001-03-12 17:16:18',
                'updated_at' => '2001-03-12 17:16:18',
                'category_id' => 0,
                'image' => 'post_1.jpeg',
                'alt' => 'bg-3',
                'title' => 'Lorem, ipsum dolor',
                'slug' => 'lorem-ipsum-dolor',
                'message' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati dolor sit amet consectetur adipisicing.'
            ],
            [
                'created_at' => '2001-03-13 17:16:18',
                'updated_at' => '2001-03-13 17:16:18',
                'category_id' => 0,
                'image' => 'post_4.jpeg',
                'alt' => 'bg-3',
                'title' => 'Lorem, ipsum dolor',
                'slug' => 'lorem-ipsum-dolor',
                'message' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati dolor sit amet consectetur adipisicing.'
            ],
            [
                'created_at' => '2001-03-15 17:16:18',
                'updated_at' => '2001-03-15 17:16:18',
                'category_id' => 0,
                'image' => 'post_5.jpg',
                'alt' => 'bg-3',
                'title' => 'Lorem, ipsum dolor',
                'slug' => 'lorem-ipsum-dolor',
                'message' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati dolor sit amet consectetur adipisicing.'
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
        foreach ($this->posts as $key => $post):
            DB::table('posts')->insert([
                'title' => $post['title'],
                'message' => $post['message'],
                'image' => $post['image'],
                'alt' => $post['alt'],
                'slug' => "{$post['slug']}-{$key}",
                'category_id' => $post['category_id'],
                'created_at' => $post['created_at'],
                'updated_at' => $post['updated_at']
            ]);
        endforeach;
    }
}
