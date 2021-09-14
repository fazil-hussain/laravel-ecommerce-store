<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ManageOrderController extends Controller
{
    public function neworder()
    {
        return view('admin.neworder');
    }
    public function approve($order_id){

        $order=Order::where('id',$order_id);
        $order->update(['order_status'=>1]);


        return response($order_id);
    }

    public function reject($order_id){

        $order=Order::where('id',$order_id);
        $order->update(['order_status'=>2]);
        return response($order_id);
    }

    public function pendingorder(){

        $record=Order::where('order_status','=',0)->get();
        $count=$record->count();
        return response ($count);

    }
    public function deliver($order_id){
        $order=Order::where('id',$order_id);
        $order->update(['order_status'=>3]);
        return response($order_id);

    }
    public function orderdetails($order_id){
        $order = Order::find($order_id);
        return view('admin.orderdetails')->with('order',$order);
    }

    public function delorder($order_id){
        $order=Order::find($order_id);
        $order->delete();
        return response(1);
    }

}
