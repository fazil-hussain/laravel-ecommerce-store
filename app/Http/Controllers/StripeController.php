<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Stripe;

class StripeController extends Controller
{
    /**
     * payment view
     */
    public function handleGet()
    {
        return view('site.payment');
    }

    /**
     * handling payment with POST
     */
    public function handlePost(Request $request)
    {
        Stripe\Stripe::setApiKey('sk_test_51JBIZ8KOs4nbCfp4ybA8aHZx9wh97spaCKQf4DFF9XD9Y2CQlwx8ptzHTBcWA7b0p2B8XHqYmdKggKTV6KlJyKCn00EC2jsD19');
        $amount=$request->amount;
        Stripe\Charge::create ([
                "amount" => $amount*100,
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => "Making test payment."
        ]);

        $order = Order::onlyTrashed()->where('id', $request->pro_id);
        // $order->status = 1;
        $order->update(['payment_status' => 1]);
        // $order->update();
        $order->restore();

        toastr()->success('Order Success Full');
        return redirect()->route('home');
    }
}
