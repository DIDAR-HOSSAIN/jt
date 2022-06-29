<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'date', 'product_name', 'product_category','product_image','product_description','unit_price','qty','Total_price','user_name',
    ];
}
