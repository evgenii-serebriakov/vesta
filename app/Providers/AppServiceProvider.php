<?php

namespace App\Providers;

use App\Repositories\PostsRepository;
use App\Repositories\Interfaces\PostsRepositoryInterface;
use App\Http\View\Composers\PostsComposer;
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
        $this->app->bind(
            PostsRepositoryInterface::class, 
            PostsRepository::class
        );

        View::share('sprites', config('app.sprites'));

        View::composer('components.home.home-post-preview', PostsComposer::class);
    }
}
