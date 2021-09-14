@extends('site.header')
@section('styles')
<style>
    .reqid {
        color: red;
        display: none;
    }

    .errorspan {
        color: red;
        font-size: 3rem;
        text-align: center;
    }

</style>
@endsection
@section('content')
<div class="bg0 m-t-80 p-b-80">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            @if (isset($products))
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter="*">
                    All Products
                </button>

                @foreach (App\Models\Category::all() as $category)
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 bt-{{ $category->id  }}" data-filter=".cat-{{ $category->id }}">
                    {{ $category->name }}
                </button>
                @endforeach

            </div>
            @endif


            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Filter
                </div>

                <div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
                    <i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
                    <i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
                    Search
                </div>
            </div>

            <!-- Search product -->
            <div class="dis-none panel-search w-full p-t-10 p-b-15">
                <div class="bor8 dis-flex p-l-15">
                    <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>

                    <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
                </div>
            </div>

            <!-- Filter -->
            {{-- <div class="dis-none panel-filter w-full p-t-10">
                <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
                    <div class="filter-col1 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Sort By
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Default
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Popularity
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Average rating
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                    Newness
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Price: Low to High
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    Price: High to Low
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col2 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Price
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                    All
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    $0.00 - $50.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    $50.00 - $100.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    $100.00 - $150.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    $150.00 - $200.00
                                </a>
                            </li>

                            <li class="p-b-6">
                                <a href="#" class="filter-link stext-106 trans-04">
                                    $200.00+
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col3 p-r-15 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Color
                        </div>

                        <ul>
                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #222;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Black
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04 filter-link-active">
                                    Blue
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Grey
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Green
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
                                    <i class="zmdi zmdi-circle"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    Red
                                </a>
                            </li>

                            <li class="p-b-6">
                                <span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
                                    <i class="zmdi zmdi-circle-o"></i>
                                </span>

                                <a href="#" class="filter-link stext-106 trans-04">
                                    White
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="filter-col4 p-b-27">
                        <div class="mtext-102 cl2 p-b-15">
                            Tags
                        </div>

                        <div class="flex-w p-t-4 m-r--5">
                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Fashion
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Lifestyle
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Denim
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Streetstyle
                            </a>

                            <a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                                Crafts
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row isotope-grid">
            @if (isset($products))
            @foreach ($products as $pro)
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item cat-{{ $pro->category_id }}">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="{{ $pro->images->first()->image }}" alt="IMG-PRODUCT">

                        <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1 quickviewbtn" id="{{ $pro->id }}">
                            Quick View
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                {{ $pro->name }}
                            </a>

                            <span class="stext-105 cl3">
                                {{ $pro->price }}
                            </span>
                        </div>

                        <div class="block2-txt-child2 flex-r p-t-3">
                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                <img class="icon-heart1 dis-block trans-04" src="{{ asset('images/icons/icon-heart-01.png') }}" alt="ICON">
                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('images/icons/icon-heart-02.png') }}" alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @elseif(isset($error))
            <div>
                <span class="errorspan">{{ $error?? $error }}</span>
            </div>
            @else
                <div>
                    <span class="errorspan">No Product Availabel</span>
                </div>
            @endif

        </div>
        <!-- Load more -->
        <div class="flex-c-m flex-w w-full p-t-45">
            {{-- <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">

            </a> --}}
            {{-- {!! $products->links() !!} --}}
        </div>
    </div>
</div>
<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
    <div class="overlay-modal1 js-hide-modal1"></div>

    <div class="container">
        <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
            <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                <img src="{{ asset('images/icons/icon-close.png') }}" alt="CLOSE">
            </button>

            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots">
                                <ul class="slick3-dots" role="tablist" id="image-slider" style="">

                                </ul>
                            </div>
                            <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                            <div class="slick3 gallery-lb">
                                <div class="item-slick3" data-thumb="images/product-detail-01.jpg">
                                    <div class="wrap-pic-w pos-relative" id="full-image">


                                    </div>
                                </div>

                                {{-- <div class="item-slick3" data-thumb="images/product-detail-02.jpg">
                                    <div class="wrap-pic-w pos-relative">
                                        <img src="{{ asset('images/product-detail-02.jpg') }}" alt="IMG-PRODUCT">

                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
                                    <i class="fa fa-expand"></i>
                                </a>
                            </div>
                        </div>

                        <div class="item-slick3" data-thumb="images/product-detail-03.jpg">
                            <div class="wrap-pic-w pos-relative">
                                <img src="{{ asset('images/product-detail-03.jpg') }}" alt="IMG-PRODUCT">

                                <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
                                    <i class="fa fa-expand"></i>
                                </a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-5 p-b-30">
            <div class="p-r-50 p-t-5 p-lr-0-lg">
                <h4 id="m-pro-name" class="mtext-105 cl2 js-name-detail p-b-14">

                </h4>

                <span class="mtext-106 cl2" id="m-pro-price">

                </span>

                <p class="stext-102 cl3 p-t-23" id="m-pro-description">

                </p>

                <!--  -->
                <div class="p-t-33">
                    <div class="flex-w flex-r-m p-b-10">
                        <div class="size-203 flex-c-m respon6">
                            Size
                        </div>

                        <div class="size-204 respon6-next">
                            <span id="sizespan" class="reqid ">*Required</span>
                            <div class="rs1-select2 bor8 bg0">
                                <select class="js-select2" name="size" id="m-pro-size">
                                    <option selected value="">Select Size</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>
                    </div>

                    <div class="flex-w flex-r-m p-b-10">
                        <div class="size-203 flex-c-m respon6">
                            Color
                        </div>

                        <div class="size-204 respon6-next">
                            <span id="colorpan" class="reqid">*Required</span>
                            <div class="rs1-select2 bor8 bg0">
                                <select id="m-pro-color" class="js-select2" name="color">
                                    <option>Select Color</option>
                                </select>

                                <div class="dropDownSelect2"></div>
                            </div>

                        </div>
                    </div>

                    <div class="flex-w flex-r-m p-b-10">
                        <div class="size-204 flex-w flex-m respon6-next">
                            <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                </div>

                                <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" id="pro_quantity" value="1">

                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                </div>
                            </div>

                            <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" id="addtocart">
                                Add to cart
                            </button>
                        </div>
                    </div>
                </div>

                <!--  -->
                <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                    <div class="flex-m bor9 p-r-10 m-r-11">
                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                            <i class="zmdi zmdi-favorite"></i>
                        </a>
                    </div>
                    <input type="hidden" id="m-pro-id" name="p_id">
                    <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                        <i class="fa fa-twitter"></i>
                    </a>

                    <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
@section('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {


        @if(isset($cat_id))
        var cat_id = {
            {
                $cat_id
            }
        };
        $('.bt-' + cat_id).click();
        @endif

        @if(isset($searchpro))

        @endif
        //.....................Quick View Start.......................//

        $('.quickviewbtn').click(function() {

            var id = $(this).attr('id');
            // alert(id)
            $.ajax({
                url: '/getdata/' + id
                , type: 'get'
                , dataType: 'json'
                , success: function(response) {
                    $('#m-pro-id').attr('pro_id', response.product.id);
                    $('#m-pro-name').text(response.product.name);
                    $('#m-pro-price').text('RS: ' + response.product.price);
                    $('#m-pro-description').text(response.product.description);

                    $('#m-pro-size').empty();
                    $('#m-pro-size').append(`<option value="">
                                   Select Size
                               </option>`);
                    for (let index = 0; index < response.sizes.length; index++) {

                        // console.log(response.sizes[index].size);

                        $('#m-pro-size').append(`<option value="${response.sizes[index].id}">
                                   ${response.sizes[index].size}
                               </option>`);
                    }
                    $('#m-pro-color').empty();
                    $('#m-pro-color').append(`<option value="">
                                   Select Color
                               </option>`);
                    for (let index = 0; index < response.colors.length; index++) {

                        $('#m-pro-color').append(`<option value="${response.colors[index].id}">
                                    ${response.colors[index].name}
                                </option>`);
                    }

                    $('#image-slider').empty();
                    for (let index = 0; index < response.images.length; index++) {

                        $('#image-slider').append(
                            '<li  role="presentation">' +
                            '<img class="activeimg" src="' + response.images[index]
                            .image + '">' +
                            '</li>'
                        )
                    }

                    $('#full-image').empty();
                    $('#full-image').append(
                        '<img src="' + response.images[0].image + '" id="appnd-image">'
                    )

                    $('.activeimg').click(function() {
                        var src = $(this).attr('src');
                        $('#appnd-image').attr('src', src);
                    });
                }
            });
        });
        //.....................Quick View END.......................//


        //.....................Add TO Cart Start.......................//
        $('#m-pro-size').on('change', function() {
            var value = $('option:selected', this).val();
            if (value == "") {
                $('#sizespan').css('display', 'inline');
            } else {
                $('#sizespan').css('display', 'none');
            }
        })

        $('#m-pro-color').on('change', function() {
            var value = $('option:selected', this).val();
            if (value == "") {
                $('#colorpan').css('display', 'inline');
            } else {
                $('#colorpan').css('display', 'none');
            }
        })
        $('#addtocart').click(function() {

            var pro_id = $('#m-pro-id').attr('pro_id');
            var pro_size = $('#m-pro-size').val();
            var pro_color = $('#m-pro-color').val();
            var pro_quantity = $('#pro_quantity').val();

            if (pro_size == "") {
                $('#sizespan').css("display", "inline");
            } else if (pro_color == "") {
                $('#colorpan').css("display", "inline");
            } else {
                $.ajax({
                    url: "{{route('addtocart')}}"
                    , type: 'POST'
                    , data: {
                        id: pro_id
                        , size: pro_size
                        , color: pro_color
                        , qty: pro_quantity,

                    }
                    , success: function(response) {
                        $('#cart-icon').attr('data-notify', response);
                        swal("Poduct Added", "success");
                    }
                });
            }
        });
        //.....................Add TO Cart End.......................//


    });

</script>
@endsection
