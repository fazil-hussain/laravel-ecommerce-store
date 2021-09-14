@extends('admin.admindashboard')
@section('heading')
Add Category
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
@endsection
@section('content')
    <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <form action="{{ route('category.store') }}" enctype="multipart/form-data" method="POST">
                            <div class="header">
                                <h2><strong>Enter Category Details</strong></h2>

                            </div>
                            <div class="body">

                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <p> <b>Category Name</b> </p>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                {{-- <div class="row clearfix mt-3">

                                    <div class="col-lg-4 col-md-4">
                                        <p> <b>Select Color</b> </p>
                                        <select class="form-control show-tick ms select2" multiple data-placeholder="Select">
                                            <option>Mustard</option>
                                            <option>Ketchup</option>
                                            <option>Relish</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <p> <b>Select Size</b> </p>
                                        <select class="form-control show-tick ms select2" multiple data-placeholder="Select">
                                            <option>Mustard</option>
                                            <option>Ketchup</option>
                                            <option>Relish</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <p> <b>Select Category</b> </p>
                                        <select class="form-control show-tick ms select2" multiple data-placeholder="Select">
                                            <option>Mustard</option>
                                            <option>Ketchup</option>
                                            <option>Relish</option>
                                        </select>
                                    </div>


                                </div> --}}
                                <div class="row clearfix m-t-30">
                                        <div class="col-lg-12 col-md-12">
                                            <p> <b> Category Description</b> </p>
                                            <div class="form-line">
                                                <textarea rows="4" name="description" class="form-control no-resize" placeholder="Please type what you want..."></textarea>
                                            </div>
                                        </div>

                                </div>
                                <div class="row clearfix m-t-30">
                                    <div class="col-lg-9 col-md-9">
                                        <p> <b> Category Tags</b> </p>
                                        <div class="form-line">
                                            <input type="text" name="tags" class="form-control" data-role="tagsinput" value="">
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-3 col-md-3">
                                        <p> <b> Prpdcut Quantity</b> </p>
                                        <div class="form-line">
                                        <input type="number" name="" id="">
                                        </div>
                                    </div> --}}
                                    <div class="col-lg-3 col-md-3">
                                        <p> <b> Category image</b> </p>
                                        <div class="form-line">
                                            <input type="file" name="image" class="dropify">
                                        </div>
                                    </div>
                                 </div>

                            </div>
                    </div>
                     <button class="btn btn-primary float-right " type="submit">Save</button>
                </div>
        </form>
    </div>
@endsection
@section('scripts')
<script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
@endsection
