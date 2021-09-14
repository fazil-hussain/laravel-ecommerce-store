<?php

namespace App\Http\Controllers;

use App\Helpers\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class OrderController extends Controller
{
    public function insert(Request $request)
    {
        
        if ($request->payment_method == 'cash') {

            $order=Order::create($request->all());

            foreach (Cart::products() as  $produt) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'pro_id' => $produt->id,
                        'qty' => $produt->qty,
                        'color' => $produt->color,
                        'size' => $produt->size
                    ]);
            }
            Session::forget('cart');
            Session::forget('shipping');
            toastr()->success('Order Success Full');
            return redirect()->route('home');


        }
        else {
            $order=Order::create($request->all());
            foreach (Cart::products() as  $produt) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'pro_id' => $produt->id,
                    'qty' => $produt->qty,
                    'color' => $produt->color,
                    'size' => $produt->size
                ]);
                $order->delete();
        }

            Session::forget('cart');
            Session::forget('shipping');

        return view('site.payment')->with('order_id',$order->id)->with('amount', $request->amount);

        }

    }
}
