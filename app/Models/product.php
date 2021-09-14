<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'category_id', 'description', 'tags', 'stock','price',
    ];

    public function setImageAttribute($value)
    {

        $this->attributes['image'] = ImageHelper::saveImage($value, 'images');
    }
    public function getImageAttribute($value)
    {
        return $this->attributes['image'] = asset($value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function colors()
    {
        return $this->hasMany(ProductColor::class,'product_id');
    }
    public function sizes()
    {
        return $this->hasMany(ProductSize::class,'product_id');
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class,'product_id');
    }


}
