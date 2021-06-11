<?php

namespace App\Providers;

use App\Repositories\PostsRepository;
use App\Repositories\Interfaces\PostsRepositoryInterface;
use App\Repositories\ReviewsRepository;
use App\Repositories\Interfaces\ReviewsRepositoryInterface;
use App\Repositories\VideoRepository;
use App\Repositories\Interfaces\VideoRepositoryInterface;

use App\Http\View\Composers\PostsComposer;
use App\Http\View\Composers\VideoComposer;
use App\Http\View\Composers\SharedComposer;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Jenssegers\Date\Date;

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
        Date::setlocale(config('app.locale'));

        $this->app->bind(
            PostsRepositoryInterface::class, 
            PostsRepository::class
        );
        
        $this->app->bind(
            VideoRepositoryInterface::class, 
            VideoRepository::class
        );
        
        $this->app->bind(
            ReviewsRepositoryInterface::class, 
            ReviewsRepository::class
        );

        View::share('sprites', config('app.sprites'));

        View::composer('components.home.home-post-preview', PostsComposer::class);

        View::composer('components.home.home-video-preview', VideoComposer::class);

        View::composer([
            'components.navbar', 
            'components.navbar-bottom', 
            'components.drawer'
        ], SharedComposer::class);
    }
}
