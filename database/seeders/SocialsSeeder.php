<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SocialsSeeder extends Seeder
{
    function __construct() {
        $this->socials = [
            [
                'path' => '#/',
                'flag' => true,
                'title' => 'Youtube',
                'text' => 'Youtube',
                'icon' => '#icon-youtube',
                'color' => '#FF0000'
            ],
            [
                'path' => '#/',
                'flag' => true,
                'title' => 'Instagram',
                'text' => 'Instagram',
                'icon' => '#icon-instagram',
                'color' => '#8134AF'
            ],
            [
                'path' => '#/',
                'flag' => true,
                'title' => 'WhatsApp',
                'text' => 'WhatsApp',
                'icon' => '#icon-whatsapp',
                'color' => '#4FCE5D'
            ],
            [
                'path' => '#/',
                'flag' => true,
                'title' => 'Twitter',
                'text' => 'Twitter',
                'icon' => '#icon-twitter',
                'color' => '#55ACEE'
            ],
            [
                'path' => '#/',
                'flag' => true,
                'title' => 'Facebook',
                'text' => 'Facebook',
                'icon' => '#icon-facebook',
                'color' => '#3C5898'
            ],
            [
                'path' => '#/',
                'flag' => true,
                'title' => 'Вконтакте',
                'text' => 'VK',
                'icon' => '#icon-vk',
                'color' => '#5181B8'
            ],
            [
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
                'color' => $social['color']
            ]);
        endforeach;
    }
}
