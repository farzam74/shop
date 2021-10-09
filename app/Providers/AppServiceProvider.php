<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Comment;
use App\Observers\CommentObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Events\Dispatcher;
use TCG\Voyager\Facades\Voyager;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Voyager::useModel('Category', \App\Models\Category::class);
        Voyager::useModel('User', \App\Models\User::class);

        $categories=Category::all();

        View::share('categories',$categories);

    }
}
