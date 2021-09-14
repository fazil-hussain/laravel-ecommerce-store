@extends('admin.admindashboard')

@section('heading')
Dashboard
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/plugins/morrisjs/morris.css') }}" />
@endsection
@section('content')
<div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center">
        <div class="card">
            <div class="body">
                <input type="text" class="knob" value="42" data-linecap="round" data-width="100" data-height="100" data-thickness="0.08" data-fgColor="#00adef" readonly>
                <p>Customers</p>
                <div class="d-flex bd-highlight text-center mt-4">
                    <div class="flex-fill bd-highlight">
                        <small class="text-muted">Direct</small>
                        <h5 class="mb-0">254</h5>
                    </div>
                    <div class="flex-fill bd-highlight">
                        <small class="text-muted">Discovery</small>
                        <h5 class="mb-0">254</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center">
        <div class="card">
            <div class="body">
                <input type="text" class="knob" value="81" data-linecap="round" data-width="100" data-height="100" data-thickness="0.08" data-fgColor="#ee2558" readonly>
                <p>Total Orders</p>
                <div class="d-flex bd-highlight text-center mt-4">
                    <div class="flex-fill bd-highlight">
                        <small class="text-muted">Internal</small>
                        <h5 class="mb-0">34GB</h5>
                    </div>
                    <div class="flex-fill bd-highlight">
                        <small class="text-muted">External</small>
                        <h5 class="mb-0">531GB</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center">
        <div class="card">
            <div class="body">
                <input type="text" class="knob" value="62" data-linecap="round" data-width="100" data-height="100" data-thickness="0.08" data-fgColor="#8f78db" readonly>
                <p>Investiment</p>
                <div class="d-flex bd-highlight text-center mt-4">
                    <div class="flex-fill bd-highlight">
                        <small class="text-muted">Internal</small>
                        <h5 class="mb-0">25<small>(-23%)</small></h5>
                    </div>
                    <div class="flex-fill bd-highlight">
                        <small class="text-muted">External</small>
                        <h5 class="mb-0">12<small>(+150%)</small></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-6 text-center">
        <div class="card">
            <div class="body">
                <input type="text" class="knob" value="38" data-linecap="round" data-width="100" data-height="100" data-thickness="0.08" data-fgColor="#f67a82" readonly>
                <p>Revenue</p>
                <div class="d-flex bd-highlight text-center mt-4">
                    <div class="flex-fill bd-highlight">
                        <small class="text-muted">Inbound</small>
                        <h5 class="mb-0">15K</h5>
                    </div>
                    <div class="flex-fill bd-highlight">
                        <small class="text-muted">Outbound</small>
                        <h5 class="mb-0">2K</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{ asset('assets/js/pages/charts/jquery-knob.min.js') }}"></script>
<script src="{{ asset('assets/bundles/jvectormap.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/morrisscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/bundles/sparkline.bundle.js') }}"></script> <!-- Sparkline Plugin Js -->
<script src="{{ asset('assets/bundles/knob.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/ecommerce.js') }}"></script>

@endsection


