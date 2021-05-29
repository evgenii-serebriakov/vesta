<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsSeeder extends Seeder
{
    function __construct() {
        $this->contacts = [
            [
                'flag' => true,
                'title' => 'Телефон',
                'text' => '8 (922) 631 02 00',
                'icon' => '#icon-phone',
                'color' => '#17c42e'
            ],
            [
                'flag' => true,
                'title' => 'Почта',
                'text' => 't28051962l@yandex.ru',
                'icon' => '#icon-mail',
                'color' => '#22b9f5'
            ],
            [
                'flag' => true,
                'title' => 'Адрес',
                'text' => 'г. Снежинск, ул. Ленина, д. 8, оф. 31',
                'icon' => '#icon-map',
                'color' => '#be0000'
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
        foreach ($this->contacts as $contact):
            DB::table('contacts')->insert([
                'flag' => $contact['flag'],
                'title' => $contact['title'],
                'text' => $contact['text'],
                'icon' => $contact['icon'],
                'color' => $contact['color'],
            ]);
        endforeach;
    }
}
