<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Blade;

use App\{
    Sitesetting,
    Page,
    Category
    };

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
        Schema::defaultStringLength(191);


        view()->composer(['front.index'], function($view){
            $view->with('aboutus', Page::find(1));
        });

        view()->composer('front.index', function($view){
            $view->with('contactus', Page::find(2));
        });
 
        view()->composer('front.layouts.master', function($view){
            $view->with('sitesettings', Sitesetting::find(1));
        });


        view()->composer('front.index', function($view){
            $view->with('categories', Category::where('is_active', 1)->get());
        });

    }
}
