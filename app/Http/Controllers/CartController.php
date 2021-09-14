<?php

namespace App\Http\Controllers;

use App\Helpers\Cart;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cart(){
        return view('site/shopingcart');
     }
     public function add(Request $request){


        //  return Api::setResponse('message','hiii');
        // return response(1);

         if(Cart::add($request->id,$request->size,$request->color,$request->qty ?? 1)){

             return response()->json(Cart::qty());

            //  return Api::setResponse('qty',Cart::qty());

         } else {
            //  return Api::setError('Item out of stock!');
            return response('item out of stock');
         }
     }

     public function remove(Request $request){
         Cart::remove($request->id);

        //  return response()->json(Cart::qty());
        if(Session::has('cart')){
            return response()->json(Cart::has('cart'));
        }else{
            return 0;
        }
        //  return response('cart', Session::get('cart'));
     }

     public function increment(Request $request){
         if(Cart::increase($request->id)){
            return response()->json(Session::get('cart'));
            //  return Api::setResponse('cart',Session::get('cart'));
         } else {

            return response()->json('false');
         }
     }

     public function decrement(Request $request){
         Cart::decrease($request->id);
         return response()->json(Session::get('cart'));
        //  return Api::setResponse('cart',Session::get('cart'));
     }

     public function clear(){
         Session::forget('cart');
         return redirect()->back();
     }

     protected function states(Request $request)
    {
        $states = State::where('country_id',$request->country_id)->get();
        return response()->json($states);
    }
    protected function cities(Request $request)
    {
        $state= City::where('state_id',$request->state_id)->get();
        return response()->json($state);
    }

    public function checkout(Request $requst){
        $req=[

            'coountry' => $requst->country,
            'state' => $requst->state,
            'city' => $requst->city,
            'shippingcharges' => $requst->shippingcharges
        ];

        Session::put('shipping', $req);

        return view('site.checkout');
    }
    public function updatedamount()
    {
        $amount=Session::has('cart')['amount'];
        return response($amount);
    }

}
