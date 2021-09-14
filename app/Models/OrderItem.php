<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable=[
        'order_id','pro_id','qty','size','color'
    ];
    public function OrderColor(){
        return $this->belongsTo(Color::class,'order_id');
    }
    public function OrderSize(){
        return $this->belongsTo(Size::class,'order_id');
    }
    public function productDetail(){
        return $this->belongsTo(Product::class,'pro_id');
    }
}
