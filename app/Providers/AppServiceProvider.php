<?php

namespace App\Providers;

use App\Observers\PostObserver;
use Illuminate\Support\ServiceProvider;
use Modules\Post\Entities\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Post::observe(PostObserver::class);
    }
}
