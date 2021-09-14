<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable=[

        'name','phone','email','country_id','state_id','city_id','address','zipcode','amount','payment_method','payment_status','order_status'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
    public function state()
    {
        return $this->belongsTo(State::class,'state_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

}
