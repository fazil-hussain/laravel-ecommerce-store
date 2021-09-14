@extends('admin.admindashboard')
@section('content')
@section('heading')
Add Product
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.css') }}" />
{{-- <link rel="stylesheet" href="{{ asset('assets/plugins/multi-select/css/multi-select.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" />
@endsection
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Enter Product Details</strong></h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('prodcuct.store') }}" method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">

                                <div class="col-lg-12 col-md-12">
                                    <p> <b>Enter Name</b> </p>
                                    <input type="text" name="name" class="form-control">
                                </div>

                            </div>
                            <div class="row clearfix mt-3">

                                <div class="col-lg-4 col-md-4">
                                    <p> <b>Select Color</b> </p>
                                    <select class="form-control show-tick ms select2" name="color[]" multiple data-placeholder="Select">
                                        @foreach(App\Models\Color::all() as $color)
                                        <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <p> <b>Select Size</b> </p>
                                    <select class="form-control show-tick ms select2" name="size[]" multiple data-placeholder="Select">
                                        @foreach(App\Models\Size::all() as $size)
                                        <option value="{{ $size->id }}">{{ $size->size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <p> <b>Select Category</b> </p>
                                    <select class="form-control show-tick ms select2" name="category_id"  data-placeholder="Select">
                                    <option>Select Category</option>
                                    @foreach (App\Models\category::all() as $category)
                                        <option value="{{ $category->id }}" id="{{ $category->id  }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                </div>


                            </div>
                             <div class="row clearfix m-t-30">
                                    <div class="col-lg-12 col-md-12">
                                        <p> <b> Prpdcut Description</b> </p>
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" name="description" placeholder="Enter Product Description"></textarea>
                                        </div>
                                    </div>

                            </div>
                            <div class="row clearfix m-t-30">
                                <div class="col-lg-3 col-md-3">
                                    <p> <b> Prpdcut Tags</b> </p>
                                    <div class="form-line">
                                        <input type="text" class="form-control " name="tags" data-role="tagsinput" value="">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <p> <b> Prpdcut Quantity</b> </p>
                                    <div class="form-line">
                                       <input type="number" name="quantity" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <p> <b> Prpdcut Price</b> </p>
                                    <div class="form-line">
                                       <input type="number" name="price" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <p> <b> Prpdcut image</b> </p>
                                    <div class="form-line">
                                        <input type="file" multiple name="image[]" class="dropify">
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary float-right">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
@section('scripts')
<script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
{{-- <script src="{{ asset('assets/plugins/multi-select/js/jquery.multi-select.js') }}"></script> --}}
<script src="{{ asset('assets/js/pages/forms/advanced-form-elements.js') }}"></script>
@endsection
