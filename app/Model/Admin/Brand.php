<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected  $fillable =[
        'name',
        'logo'
    ];

    public function getLogoAttribute($logo){
        return 'storage/'.$logo;
    }


    public function products(){
        return $this->hasMany(Product::class);
    }
}
