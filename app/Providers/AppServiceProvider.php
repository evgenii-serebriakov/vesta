<?php

namespace App\Providers;

use App\Repositories\PostsRepository;
use App\Repositories\Interfaces\PostsRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('sprites', config('app.sprites'));

        // View::composer(['posts'], );
        $this->app->bind(
            PostsRepositoryInterface::class, 
            PostsRepository::class
        );
    }
}
