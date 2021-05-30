<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SocialsSeeder extends Seeder
{
    function __construct() {
        $this->socials = [
            [
                'created_at' => '2001-03-10 17:16:18',
                'updated_at' => '2001-03-10 17:16:18',
                'path' => '#/',
                'flag' => true,
                'title' => 'Youtube',
                'text' => 'Youtube',
                'icon' => '#icon-youtube',
                'color' => '#FF0000'
            ],
            [
                'created_at' => '2001-03-11 17:16:18',
                'updated_at' => '2001-03-11 17:16:18',
                'path' => '#/',
                'flag' => true,
                'title' => 'Instagram',
                'text' => 'Instagram',
                'icon' => '#icon-instagram',
                'color' => '#8134AF'
            ],
            [
                'created_at' => '2001-03-17 17:16:18',
                'updated_at' => '2001-03-17 17:16:18',
                'path' => '#/',
                'flag' => true,
                'title' => 'WhatsApp',
                'text' => 'WhatsApp',
                'icon' => '#icon-whatsapp',
                'color' => '#4FCE5D'
            ],
            [
                'created_at' => '2001-03-12 17:16:18',
                'updated_at' => '2001-03-12 17:16:18',
                'path' => '#/',
                'flag' => true,
                'title' => 'Twitter',
                'text' => 'Twitter',
                'icon' => '#icon-twitter',
                'color' => '#55ACEE'
            ],
            [
                'created_at' => '2001-03-16 17:16:18',
                'updated_at' => '2001-03-16 17:16:18',
                'path' => '#/',
                'flag' => true,
                'title' => 'Facebook',
                'text' => 'Facebook',
                'icon' => '#icon-facebook',
                'color' => '#3C5898'
            ],
            [
                'created_at' => '2001-03-13 17:16:18',
                'updated_at' => '2001-03-13 17:16:18',
                'path' => '#/',
                'flag' => true,
                'title' => 'Вконтакте',
                'text' => 'VK',
                'icon' => '#icon-vk',
                'color' => '#5181B8'
            ],
            [
                'created_at' => '2001-03-15 17:16:18',
                'updated_at' => '2001-03-15 17:16:18',
                'path' => '#/',
                'flag' => true,
                'title' => 'Viber',
                'text' => 'Viber',
                'icon' => '#icon-viber',
                'color' => '#665CAC'
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
        foreach ($this->socials as $key => $social):
            DB::table('socials')->insert([
                'title' => $social['title'],
                'path' => $social['path'],
                'flag' => $social['flag'],
                'text' => $social['text'],
                'icon' => $social['icon'],
                'color' => $social['color'],
                'created_at' => $social['created_at'],
                'updated_at' => $social['updated_at']
            ]);
        endforeach;
    }
}
