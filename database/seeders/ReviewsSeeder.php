<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsSeeder extends Seeder
{
    function __construct() {
        $this->reviews = [
            [
                'created_at' => '2001-03-10 17:16:18',
                'updated_at' => '2001-03-10 17:16:18',
                'video' => 'TgNDm7ulSkY',
                'image' => 'post_1.jpeg',
                'alt' => 'bg-1',
                'title' => 'Lorem, ipsum dolor',
            ],
            [
                'created_at' => '2001-03-11 17:16:18',
                'updated_at' => '2001-03-11 17:16:18',
                'video' => 'VsIl16MhL-I',
                'image' => 'post_4.jpeg',
                'alt' => 'bg-2',
                'title' => 'Lorem, ipsum dolor',
            ],
            [
                'created_at' => '2001-03-12 17:16:18',
                'updated_at' => '2001-03-12 17:16:18',
                'video' => 'h9L-U-hg8x4',
                'image' => 'post_5.jpg',
                'alt' => 'bg-3',
                'title' => 'Lorem, ipsum dolor',
            ],
            [
                'created_at' => '2001-03-13 17:16:18',
                'updated_at' => '2001-03-13 17:16:18',
                'video' => 'FWGyiSTQ0yo',
                'image' => 'video_4.jpg',
                'alt' => 'bg-3',
                'title' => 'Lorem, ipsum dolor',
            ],
            [
                'created_at' => '2001-03-14 17:16:18',
                'updated_at' => '2001-03-14 17:16:18',
                'video' => '-xSTF6w9Wfo',
                'image' => 'video_5.jpg',
                'alt' => 'bg-3',
                'title' => 'Lorem, ipsum dolor',
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
        foreach ($this->reviews as $review):
            DB::table('reviews')->insert([
                'title' => $review['title'],
                'video' => $review['video'],
                'image' => $review['image'],
                'alt' => $review['alt'],
                'created_at' => $review['created_at'],
                'updated_at' => $review['updated_at']
            ]);
        endforeach;
    }
}
