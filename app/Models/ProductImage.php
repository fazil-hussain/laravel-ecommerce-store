<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id','image'
    ];

    public function setImageAttribute($value){
	    if(is_string($value)){
	        $this->attributes['image'] = ImageHelper::saveImageFromApi($value,'images');
	    }
	    else if(is_file($value)){
	        $this->attributes['image'] = ImageHelper::saveImage($value,'images');
	    }
    }

    public function getImageAttribute($value)
    {
        return $this->attributes['image'] = asset($value);
    }


}
