<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;

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
        view()->composer('frontend.layout.menu',function($view){
            $view->with('navlinks',Category::where('parent_id',NULL)
            ->where('status','active')
            ->with('subcategory')
            ->where('status','active')
            ->get());
        });
    }
}
