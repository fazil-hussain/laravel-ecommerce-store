@extends('site.header')
@section('styles')
<style>
    .req{
        color:red;
        margin-bottom: 25px;
        display: none;
    }
</style>
@endsection
@section('content')
    <!-- Shoping Cart -->
    @if (Session::has('cart'))
        <form id="form" action="{{ route('checkout') }}" method="GET" class="bg0 p-t-75 p-b-85">

            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="wrap-table-shopping-cart">
                                <table class="table-shopping-cart">
                                    <tr class="table_head">
                                        <th class="column-1">Product</th>
                                        <th class="column-2"></th>
                                        <th class="column-3">Price</th>
                                        <th class="column-4">Quantity</th>
                                        <th class="column-5">Total</th>
                                        <th class="column-3">Action</th>
                                    </tr>

                                    @foreach (App\helpers\Cart::products() as $products)
                                        <tr class="table_row tr-{{ $products->id }}">
                                            <td class="column-1">
                                                <div class="how-itemcart1">
                                                    <img src="{{ $products->images->first()->image }}" alt="IMG">
                                                </div>
                                            </td>
                                            <td class="column-2">{{ $products->name }}</td>
                                            <td class="column-3">RS: {{ $products->price }}</td>
                                            <td class="column-4">
                                                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m decrmentbtn"
                                                        pro_dec_id="{{ $products->id }}"
                                                        pro_price="{{ $products->price }}">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>
                                                    <input
                                                        class="mtext-104 cl3 txt-center num-product qtyinput-{{ $products->id }}"
                                                        type="number" name="num-product1" id=""
                                                        value="{{ $products->qty }}">

                                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m incbtn"
                                                        pro_price="{{ $products->price }}"
                                                        pro_inc_id="{{ $products->id }}">
                                                        <i class="fs-16 zmdi zmdi-plus "></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="column-5 p-t-{{ $products->id }}">RS:
                                                {{ $products->price * $products->qty }}</td>
                                            <td class="column-3">
                                                <button type="button" class="btn btn-danger del_btn"
                                                    pro_id="{{ $products->id }}"><i class="fa fa-trash"
                                                        aria-hidden="true"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{-- <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="images/item-cart-05.jpg" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">Lightweight Jacket</td>
                                <td class="column-3">$ 16.00</td>
                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product2" value="1">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="column-5">$ 16.00</td>
                            </tr> --}}
                                </table>
                            </div>
                            {{-- <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                                <div class="flex-w flex-m m-r-20 m-tb-5">
                                    <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                        name="coupon" placeholder="Coupon Code">
                                    <div
                                        class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                        Apply coupon
                                    </div>
                                </div>
                                <div
                                    class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                    Update Cart
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                            <h4 class="mtext-109 cl2 p-b-30">
                                Cart Totals
                            </h4>

                            <div class="flex-w flex-t bor12 p-b-13">
                                <div class="size-208">
                                    <span class="stext-110 cl2">
                                        Subtotal:
                                    </span>
                                </div>

                                <div class="size-209">
                                    <span class="mtext-110 cl2" id="subtotall">
                                      $ {{ Session::get('cart')['amount'] }}
                                    </span>
                                </div>
                            </div>

                            <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                                <div class="size-208 w-full-ssm">
                                    <span class="stext-110 cl2">
                                        Shipping Address:
                                    </span>
                                </div>

                                <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                                    {{-- <p class="stext-111 cl6 p-t-2">
                                        There are no shipping methods available. Please double check your address, or
                                        contact us
                                        if you need any help.
                                    </p> --}}

                                    <div class="p-t-15">
                                        {{-- <span class="stext-112 cl8">
                                            Calculate Shipping
                                        </span> --}}
                                        <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">

                                            <select class="js-select2"  id="country" name="country">
                                                <option selected  value="">Select a country</option>
                                                <option value="1">Pakistan</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div><span id="countryspan" class="req">*required</span>

                                        <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                            <select class="js-select2" id="state"  name="state">
                                                <option value="">Select a State</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <span class="req" id="statespan">*required</span>

                                        <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                            <select class="js-select2" id="city"  name="city">
                                                <option value="">Select a City</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <span id="cityspan" class="req" >*required</span>

                                        {{-- <div class="flex-w">
                                            <div
                                                class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                                Update Totals
                                            </div>
                                        </div> --}}

                                    </div>
                                </div>
                            </div>
                            <div class="flex-w flex-t p-t-27 p-b-33">
                                <div class="size-208">
                                    <span class="mtext-101 cl2" id="totalamont">
                                        Total:
                                    </span>
                                </div>

                                <div class="size-209 p-t-1">
                                    <span class="mtext-110 cl2" id="shiptotal">
                                        ${{ Session::get('cart')['amount'] }}
                                    </span>
                                    <input type="hidden" value="" name="shippingcharges" id="hidentotalamoutn">
                                </div>
                            </div>
                            <button type="button" id="checkoutbtn" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                Proceed to Checkout
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @else
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <img class="img-fluid mt-5" src="{{ asset('images\shopping_cart_empty.jpg') }}" alt="cart">
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    @endif
    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.incbtn').click(function() {
                var pro_inc_id = $(this).attr('pro_inc_id');
                var pro_price = $(this).attr('pro_price');
                var pro_quantity = $('.qtyinput-' + pro_inc_id).val();
                var inc_amount = parseInt(pro_price) * parseInt(pro_quantity);
                $.ajax({
                    url: "{{ route('cartincrement') }}",
                    type: 'POST',
                    data: {
                        id: pro_inc_id,
                    },
                    success: function(response) {
                        if (response == 'false') {

                            alert('porduct out of stock');
                            $('.qtyinput-' + pro_inc_id).val(pro_quantity - 1);

                        } else {
                            $('#cart-icon').attr('data-notify', response.qty);

                            $('.p-t-' + pro_inc_id).text(inc_amount);
                            $('#subtotall').text(response.amount);
                            $('#totalamont').text(response.amount);
                            // console.log()
                        }
                    }
                });
            });

            $('.decrmentbtn').click(function() {
                var pro_dec_id = $(this).attr('pro_dec_id');
                var pro_price = $(this).attr('pro_price');
                var pro_quantity = $('.qtyinput-' + pro_dec_id).val();
                var dec_amount = parseInt(pro_price) * parseInt(pro_quantity);

                if (pro_quantity > 0) {

                    $.ajax({
                        url: "{{ route('cartdecrement') }}",
                        type: 'POST',
                        data: {
                            id: pro_dec_id,
                        },
                        success: function(response) {
                            if (response.qty < 1) {

                            }
                            $('#cart-icon').attr('data-notify', response.qty)

                            $('.p-t-' + pro_dec_id).text(dec_amount);
                            $('#subtotall').text(response.amount)
                            $('#totalamont').text(response.amount);
                        }
                    });
                } else {
                    $('.qtyinput-' + pro_dec_id).val(1);
                }

            });

            $('.del_btn').click(function() {
                var product_id = $(this).attr('pro_id');
                $.ajax({
                    url: "{{ route('removeproduct') }}",
                    type: 'POST',
                    data: {
                        id: product_id,
                    },
                    success: function(response) {

                        // console.log(response);
                        $('#cart-icon').attr('data-notify', response.qty);
                        $('.tr-' + product_id).remove();
                        $('#subtotall').text(response.amount);
                        $('#totalamont').text(response.amount);
                        
                        if (response == 0) {
                            location.reload();
                        }

                    }
                });
            })

            $('#country').on('change', function() {

                var countryID = $(this).val();
                if (countryID) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('getstates') }}',
                        data: {
                            country_id: countryID
                        },
                        success: function(response) {
                            $('#state').empty();
                            $('#state').append(
                                '<option selected value=""  >Select State</option>'
                            );
                            for (let i = 0; i < response.length; i++)
                            {
                                $('#state').append(
                                    '<option value="'+response[i].id+'">' + response[i]
                                    .name + '</option>');
                            }

                        }
                    });
                }
                var value = $('option:selected', this).val();

                if (value == "") {
                    $('#countryspan').css('display','inline');
                }
                else
                {
                $('#countryspan').css('display','none');
                }

            });

            $('#state').on('change', function() {
                var stateID = $(this).val();
                if (stateID) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('getcities') }}',
                        data: {
                            state_id: stateID
                        },
                        success: function(response) {
                            $('#city').empty();
                            $('#city').append(
                                '<option selected value=""  >Select City</option>'
                            );
                            for (let i = 0; i < response.length; i++) {
                                // console.log(response[i].charges);
                                $('#city').append(
                                    '<option charges="'+response[i].charges+'" value="'+response[i].id+'" >' + response[i]
                                    .name + '</option>'

                                );
                            }
                        }
                    });
                }

                var value = $('option:selected', this).val();
                if (value=="") {
                    $('#statespan').css('display','inline');
                }
                else
                {
                $('#statespan').css('display','none');
                }

            });
            $('#city').on('change', function() {

                var subtotal={!! Session::has('cart')? Session::get('cart')['amount']:'' !!};
                var stateID = $(this).val();
                var charges = $('option:selected', this).attr('charges');
                // console.log(charges);
                var totalamount= parseInt(charges)+parseInt(subtotal);
                $('#shiptotal').text('$'+ totalamount);

                $('#hidentotalamoutn').val(charges);

                var value = $('option:selected', this).val();
                if (value=="") {
                    $('#cityspan').css('display','inline');
                }
                else
                {
                $('#cityspan').css('display','none');
                }

            });

            $('#checkoutbtn').click(function()
            {
                $cart=[];
                var country = $('#country').val();
                var state = $('#state').val();
                var city = $('#city').val();

                if (country== "") {
                $('#countryspan').css( "display","inline");
                }
                else if (state== "") {
                    $('#statespan').css( "display","inline");
                }
               else if (city=="") {
                    $('#cityspan').css( "display","inline");
                }

                else
                {
                  $('#form').submit();
                }

                // var state = $('#state').val();
                // var city = $('#city').val();

                // if (country == null && state == null && city = null) {
                //     alert("please select address")''
                // }
            });
        });
    </script>
@endsection
