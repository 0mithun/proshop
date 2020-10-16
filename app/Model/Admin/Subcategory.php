<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Subcategory
 * @package App\Model\Admin
 */
class Subcategory extends Model
{
    protected  $fillable = [
        'name',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
