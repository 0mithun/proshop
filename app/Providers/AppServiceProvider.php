<?php

namespace App\Providers;

use App\Model\Admin\Category;
use App\Model\Admin\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);

        View::composer('partial._mainnav', function($view){
            $view->with('categories', Category::with('subcategories')->get());
        });

        View::composer('partial._mainheader', function($view){
            $view->with('categories', Category::all());
        });

        View::composer('partial._banner', function($view){
            $products = Product::with('brand')->where('main_slider',1)->first();
            $view->with('mainSliderProduct', $products);
        });
    }
}
