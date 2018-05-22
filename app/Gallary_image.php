<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallary_image extends Model
{
	protected $table = 'gallary_images';
    protected $fillable = [
        'link', 'product_id','name' 
    ];
    public function product(){
    	return $this->belongsTo()('App\Product','product_id','id');
    }
}
