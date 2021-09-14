@extends('admin.admindashboard')

@section('heading')
Order Details
@endsection
@section('styles')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div id="dvContainer">
                <div class="card">
                    <div class="body">
                        <h5><strong>Order ID: </strong> #{{$order->id}}</h5>

                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <address>
                                    <strong>Name: {{$order->name}}</strong><br> Address:
                                    {{ $order->country->name}} , {{ $order->state->name}} , {{ $order->city->name}} , <br>{{ $order->address}},<br> ZipCode:{{ $order->zipcode}} <br>
                                    <abbr title="Phone">Ph#: {{$order->phone}}</abbr>
                                </address>
                            </div>
                            <div class="col-md-6 col-sm-6 text-right">
                                <p class="mb-0"><strong>Order Date: </strong> {{$order->created_at}}</p>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-hover c_table theme-color">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th width="60px">Item</th>
                                            <th></th>
                                            <th class="hidden-sm-down">Color</th>
                                            <th class="hidden-sm-down">Size</th>
                                            <th>Quantity</th>
                                            <th class="hidden-sm-down">Unit Cost</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $subotal = 0;
                                        @endphp
                                        @foreach ($order->orderItems as $key => $orderitem)

                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td><img src="{{ asset($orderitem->productDetail->images->first()->image) }}" width="40" alt="Product img"></td>
                                            <td>{{ $orderitem->productDetail->name }}</td>
                                            <td class="hidden-sm-down">{{ $orderitem->OrderColor->name }}</td>
                                            <td class="hidden-sm-down">{{ $orderitem->OrderSize->size }}</td>
                                            <td class="hidden-sm-down">{{ $orderitem->qty }}</td>
                                            <td class="hidden-sm-down">${{ $orderitem->productDetail->price }}</td>
                                            <td>${{ $orderitem->productDetail->price*$orderitem->qty }}</td>
                                        </tr>
                                        @php
                                        $subotal+=$orderitem->productDetail->price*$orderitem->qty
                                        @endphp

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Note</h5>
                                <p>There is no more shipping charges and no return</p>
                            </div>
                            <div class="col-md-6 text-right">
                                <ul class="list-unstyled">
                                    <li><strong>Sub-Total:-</strong> ${{ $subotal }}</li>
                                    <li class="text-danger"><strong>Delivery Charges:-</strong>{{ $subotal-$order->amount }}</li>
                                    {{-- <li><strong>VAT:-</strong> 12.9%</li> --}}
                                </ul>
                                <h3 class="mb-0 text-success">USD {{ $order->amount }}</h3>
            </div>

                            </div>

                            <button id="btnPrint" class="btn btn-info"><i class="zmdi zmdi-print"></i></button>
                            {{-- <a href="javascript:void(0);" class="btn btn-primary">Back</a> --}}
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $("#btnPrint").on("click", function() {
        var divContents = $("#dvContainer").html();
        var printWindow = window.open('','Print-Window');
        printWindow.document.open();
        printWindow.document.write('<html><head><link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}"><link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}"></head><body >'+divContents+'</body></html>');
        printWindow.print();

        setTimeout(function(){
            printWindow.document.close();
            printWindow.top.close();
            },1000);



    });

</script>
@endsection
