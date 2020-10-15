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
}
