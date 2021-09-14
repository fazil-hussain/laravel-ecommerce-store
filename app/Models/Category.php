<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable  = [
        'name','description','tags','image'
    ];


    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveImage($value,'images');
    }
    public function getImageAttribute($value){
        return $this->attributes['image'] = asset($value);
     }

     public function products(){
         return $this->hasMany(Product::class);
     }
}
