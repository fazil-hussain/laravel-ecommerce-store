@extends('admin.admindashboard')

@section('heading')
Approved Orders
@endsection
@section('styles')
<link rel="stylesheet" href="assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">

@endsection
@section('content')
<div class="container-fluid">
    <!-- Basic Examples -->
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Basic</strong> Examples </h2>

                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Customer Name</th>
                                    <th>Phone</th>
                                    <th>amount</th>
                                    <th>payment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                {{-- <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th>Age</th>
                                    <th>Start date</th>
                                    <th>Salary</th>
                                </tr> --}}
                            </tfoot>
                            <tbody>
                                @foreach (App\Models\Order::where('order_status','=',1)->get() as $key => $order)
                                <tr class="tr-{{ $order->id }}">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->amount }}</td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td>
                                        <a class="btn btn-info" href="{{route('orderdetails',$order->id)}}"><i class="zmdi zmdi-receipt"></i></a>
                                        <button class="btn btn-danger deliverbtn" order_id="{{ $order->id }}" data-toggle="tooltip" data-placement="top" title="Delivered"><i class="zmdi zmdi-truck"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        //.......Aprove Button............//
        $('.deliverbtn').click(function() {
            var order_id = $(this).attr('order_id');
            $.ajax({
                url: 'deliver/' + order_id
                , type: 'get'
                , dataType: 'json'
                , success: function(response) {
                    $('.tr-' + order_id).remove();
                }
            });
        })
    });

</script>
<script src="assets/bundles/datatablescripts.bundle.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>
<script src="assets/js/pages/tables/jquery-datatable.js"></script>

@endsection
