<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use function foo\func;
use App\Billing\Stripe;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Stripe::class,function (){
            return new Stripe(config('services.stripe.secret'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('layouts.sidebar',function ($view){
            $archives=\App\Post::archives();
            $tags=\App\Tag::has('posts')->pluck('name');
            $view->with(compact('archives','tags'));
        });
    }
}
