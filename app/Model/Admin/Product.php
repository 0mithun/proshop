<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'category_id','subcategory_id','brand_id','name','code','quantity','detail','color','size','price','sell_price','discount_price','video','main_slider','hot_deal','best_rated','mid_slider','hot_new','trend','image_one','image_two','image_three','status'

    ];

    protected  $casts =[
        'main_slider'   =>'boolean',
        'hot_deal'   =>'boolean',
        'best_rated'   =>'boolean',
        'mid_slider'   =>'boolean',
        'hot_new'   =>'boolean',
        'trend'   =>'boolean',
    ];
}
