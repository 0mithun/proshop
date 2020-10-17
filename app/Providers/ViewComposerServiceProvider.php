<?php

namespace App\Providers;

use App\Model\Admin\Category;
use App\Model\Admin\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
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

        View::composer('pages.index', function($view){
            $products = Product::where('status', 1)->orderBy('id','DESC')->limit(20)->get();
            $trend = Product::where('status',1)->where('trend', 1)->orderBy('id','DESC')->limit(20)->get();

            $bestRated = Product::where('status',1)->where('best_rated', 1)->orderBy('id','DESC')->limit(20)->get();
            $hotDeal = Product::with('brand')->where('status',1)->where('hot_deal', 1)->orderBy('id','DESC')->limit(5)->get();
            $midSlider = Product::with('brand')->where('status',1)->where('mid_slider', 1)->orderBy('id','DESC')->limit(5)->get();



            $view->with('featuredProducts', $products)->with('trendProducts', $trend)->with('bestRatedProducts', $bestRated)->with('hotDealProducts', $hotDeal)->with('categories', Category::all())->with('midSliderProducts', $midSlider);
        });
    }
}
