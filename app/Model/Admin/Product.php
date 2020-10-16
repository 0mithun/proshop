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

    public function getImageOneAttribute($image_one){
        return 'storage/'.$image_one;
    }
    public function getImageTwoAttribute($image_two){
        return 'storage/'.$image_two;
    }

    public function getImageThreeAttribute($image_three){
        return 'storage/'.$image_three;
    }


    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

}
