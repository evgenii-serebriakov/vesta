<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideosSeeder extends Seeder
{
    function __construct() {
        $this->videos = [
            [
                'category_id' => 0,
                'video' => 'FWGyiSTQ0yo',
                'image' => 'video_1.jpeg',
                'alt' => 'bg-1',
                'title' => 'Lorem, ipsum dolor',
                'slug' => 'lorem-ipsum-dolor',
                'message' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati dolor sit amet consectetur adipisicing.'
            ],
            [
                'category_id' => 0,
                'video' => 'VsIl16MhL-I',
                'image' => 'video_4.jpeg',
                'alt' => 'bg-2',
                'title' => 'Lorem, ipsum dolor',
                'slug' => 'lorem-ipsum-dolor',
                'message' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati dolor sit amet consectetur adipisicing.'
            ],
            [
                'category_id' => 0,
                'video' => 'h9L-U-hg8x4',
                'image' => 'video_5.jpg',
                'alt' => 'bg-3',
                'title' => 'Lorem, ipsum dolor',
                'slug' => 'lorem-ipsum-dolor',
                'message' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati dolor sit amet consectetur adipisicing.'
            ],
            [
                'category_id' => 0,
                'video' => 'TgNDm7ulSkY',
                'image' => 'video_4.jpg',
                'alt' => 'bg-3',
                'title' => 'Lorem, ipsum dolor',
                'slug' => 'lorem-ipsum-dolor',
                'message' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, obcaecati dolor sit amet consectetur adipisicing.'
            ],
            [
                'category_id' => 0,
                'video' => '-xSTF6w9Wfo',
                'image' => 'video_5.jpg',
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
        foreach ($this->videos as $key => $video):
            DB::table('videos')->insert([
                'title' => $video['title'],
                'message' => $video['message'],
                'video' => $video['video'],
                'image' => $video['image'],
                'alt' => $video['alt'],
                'slug' => "{$video['slug']}-{$key}",
                'category_id' => $video['category_id']
            ]);
        endforeach;
    }
}
