<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Blade;

use App\{
    Sitesetting,
    Page,
    Category,
    Service
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


        view()->composer(['front.slider','front.index'], function($view){
            $view->with('servicesSlider', Service::where('is_active', 1)->orderBy('id', 'desc')->take(5)->get());
        });

    
        view()->composer(['front.layouts.master', 'back.layouts.master'], function($view){
            $view->with('sitesettings', Sitesetting::whereNotNull('id')->first());
        });


        view()->composer('front.index', function($view){
            $view->with('lastServices', Service::where('is_active', 1)->orderBy('id', 'desc')->skip(5)->take(12)->get());
        });


    }
}
