<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\FeedService;

class RSSFeedServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\FeedService', function ($app) {
          return new FeedService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
