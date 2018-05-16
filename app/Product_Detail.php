<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Detail extends Model
{
    protected $fillable = [
        'color', 'product_id', 'quantity','size_id'
    ];
}
