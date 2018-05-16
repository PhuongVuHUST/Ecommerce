<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallary_image extends Model
{
    protected $fillable = [
        'link', 'product_id', 
    ];
}
