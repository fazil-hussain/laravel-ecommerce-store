<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    protected $fillable =[
        'product_id','color_id'
    ];

    public function colorData()
    {
        return $this->belongsTo(Color::class,'color_id');
    }
}
