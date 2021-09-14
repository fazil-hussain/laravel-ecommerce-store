@extends('site.header')
@section('styles')
<style>
    @import url('https://fonts.googleapis.com/css?family=Lato:400,500,600,700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Lato', sans-serif;
    }

    /* html,body{
  display: grid;
  height: 100%;
  place-items: center;
  background: #0069d9;
  font-family: 'Lato', sans-serif;
} */
    .wrapper {
        display: inline-flex;
        background: #FFFFFF;
        height: 70px;
        width: 300px;
        align-items: center;
        justify-content: space-evenly;
        border-radius: 5px;
        padding: 20px 15px;
        box-shadow: 5px 5px 30px rgba(0, 0, 0, 0.2);
    }

    .wrapper .option {
        background: #fff;
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        margin: 0 10px;
        border-radius: 5px;
        cursor: pointer;
        padding: 0 10px;
        border: 2px solid lightgrey;
        transition: all 0.3s ease;
    }

    .wrapper .option .dot {
        height: 20px;
        width: 20px;
        background: #d9d9d9;
        border-radius: 50%;
        position: relative;
    }

    .cartdiv {
        height: 430px;
        overflow-y: scroll;
    }
    .thdd{
    position:sticky;
    top: 0 ;
}

    .wrapper .option .dot::before {
        position: absolute;
        content: "";
        top: 4px;
        left: 4px;
        width: 12px;
        height: 12px;
        background: #0069d9;
        border-radius: 50%;
        opacity: 0;
        transform: scale(1.5);
        transition: all 0.3s ease;
    }

    input[type="radio"] {
        display: none;
    }

    #option-1:checked:checked~.option-1,
    #option-2:checked:checked~.option-2 {
        border-color: #0069d9;
        background: #0069d9;
    }

    #option-1:checked:checked~.option-1 .dot,
    #option-2:checked:checked~.option-2 .dot {
        background: #fff;
    }

    #option-1:checked:checked~.option-1 .dot::before,
    #option-2:checked:checked~.option-2 .dot::before {
        opacity: 1;
        transform: scale(1);
    }

    .wrapper .option span {
        font-size: 20px;
        color: #808080;
    }

    #option-1:checked:checked~.option-1 span,
    #option-2:checked:checked~.option-2 span {
        color: #fff;
    }

</style>
@endsection
@section('content')

    <section class="bg0 p-t-104 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <form action="{{ route('order') }}" method="POST">

                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Billing Addresss
                        </h4>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" required type="text" name="name"
                                placeholder="Complete Name">
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" required type="text" name="phone"
                                placeholder="Phone No">
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" required type="text" name="email"
                                placeholder="Email Address">
                        </div>
                        <input type="hidden" name="country_id" value="{!! Session::get('shipping')['coountry'] !!}">

                        <input type="hidden" name="state_id" value="{!! Session::get('shipping')['state'] !!}">

                        <input type="hidden" name="city_id" value="{!! Session::get('shipping')['city'] !!}">
                        <input type="hidden" name="amount" value="{!! Session::get('shipping')['shippingcharges']+Session::get('cart')['amount'] !!}">

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" required name="address"
                                placeholder="Address Line">
                        </div>
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" required name="zipcode"
                                placeholder="Postcode / Zip">
                        </div>
                        <div class="wrapper bor8 m-b-20 how-pos4-parent">
                            <span>Payment</span>
                            <input type="radio" value="cash" name="payment_method" id="option-1" checked>
                            <input type="radio" value="Stripe" name="payment_method" id="option-2">
                            <label for="option-1" class="option option-1">
                                <div class="dot"></div>
                                <span>Cash</span>
                            </label>
                            <label for="option-2" class="option option-2">
                                <div class="dot"></div>
                                <span>Stripe</span>
                            </label>
                        </div>
                        <button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mt-4">
                            Submit
                        </button>
                    </form>
                </div>

                <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                    <h1 class="text-center mb-3">Your Cart <span><i class="fa fa-shopping-cart text-danger"aria-hidden="true"></i></span></h1>
                    <div class="cartdiv">
                        <table class="table">
                            <thead class="thdd bg-white">
                                <th>Image</th>
                                <th>Item</th>
                                <th>Amount</th>
                            </thead>
                            <tbody>
                           @foreach (App\helpers\Cart::products() as $products)

                           <tr >
                            <td><img class="img-responsive" src="{{ $products->images->first()->image }}" width="50px" height="50px"
                                    alt=""></td>
                            <td>
                                {{ $products->name }}
                            </td>
                            <td>
                                Rs: {{ $products->price * $products->qty }}
                            </td>
                           @endforeach
                            </tbody>
                        </table>
                    </div>
                    <h4 class="text-left font-weight-bold mt-5">Total: {!! Session::get('cart')['amount'] !!} / Charges:{!! Session::get('shipping')['shippingcharges'] !!} *Pay={!! Session::get('cart')['amount'] + Session::get('shipping')['shippingcharges']!!}</h4>
                </div>
            </div>
        </div>
    </section>

@endsection
