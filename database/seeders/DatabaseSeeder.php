<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            CategoriesSeeder::class,
            ContactsSeeder::class,
            NavigationMenuSeeder::class,
            PostsSeeder::class,
            ReviewsSeeder::class,
            SocialsSeeder::class,
            VideosSeeder::class,
        ]);
    }
}
