@extends('admin.admindashboard')
@section('content')
@section('heading')
Update Product
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
                            <form action="{{ route('prodcuct.update',$dataa->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                            <div class="row clearfix">

                                <div class="col-lg-12 col-md-12">
                                    <p> <b>Enter Name</b> </p>
                                    <input type="text" value="{{ $dataa->name }}" name="name" class="form-control">
                                </div>

                            </div>
                            <div class="row clearfix mt-3">
                                <div class="col-lg-4 col-md-4">
                                    <p> <b>Select Color</b> </p>
                                        {{-- @foreach ($dataa->colors as $color)
                                        {{ dd( $color->colorData->name) }}
                                        @endforeach --}}

                                    <select class="form-control show-tick ms select2"  name="color[]" multiple data-placeholder="Select">

                                        @foreach(App\Models\Color::all() as $color)
                                        @foreach ($dataa->colors as  $colorr)

                                        <option value="{{ $color->id }}"
                                        @if ($color->id==$colorr->colorData->id)
                                        selected
                                        @endif
                                        @endforeach
                                        >{{ $color->name}}</option>
                                        @endforeach

                                        {{-- @foreach($aSports as $aKey => $aSport)
                                        @foreach($aItem->sports as $aItemKey => $aItemSport)
                                            <option value="{{$aKey}}" @if($aKey == $aItemKey)selected="selected"@endif>{{$aSport}}</option>
                                        @endforeach
                                    @endforeach --}}

                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <p> <b>Select Size</b> </p>
                                    <select class="form-control show-tick ms select2" name="size[]" multiple data-placeholder="Select">
                                        @foreach (App\Models\size::all() as $sizez)
                                        @foreach ($dataa->sizes as $sizee)

                                        <option value="{{ $sizez->id }}" @if ($sizez->id==$sizee->SizeData->id)
                                            selected
                                        @endif
                                        @endforeach>{{ $sizez->size }}</option>
                                        @
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <p> <b>Select Category</b> </p>
                                    <select class="form-control show-tick ms select2" name="category"  data-placeholder="Select">
                                        @foreach (App\Models\category::all() as $category)
                                        <option value="{{ $category->id }}" @if ($dataa->category_id == $category->id )
                                            selected
                                        @endif
                                        {{-- @endforeach --}}
                                        >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                            </div>
                             <div class="row clearfix m-t-30">
                                    <div class="col-lg-12 col-md-12">
                                        <p> <b> Prpdcut Description</b> </p>
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" name="description" placeholder="Enter Product Description">{{ $dataa->description }}</textarea>
                                        </div>
                                    </div>

                            </div>
                            <div class="row clearfix m-t-30">
                                <div class="col-lg-3 col-md-3">
                                    <p> <b> Prpdcut Tags</b> </p>
                                    <div class="form-line">
                                        <input type="text" class="form-control " value="{{ $dataa->tags }}" name="tags" data-role="tagsinput" value="">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <p> <b> Prpdcut Quantity</b> </p>
                                    <div class="form-line">
                                       <input type="number" name="quantity" value="{{ $dataa->stock }}" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">
                                    <p> <b> Prpdcut Price</b> </p>
                                    <div class="form-line">
                                       <input type="number" name="price" value="{{ $dataa->price }}" class="form-control" id="">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3">

                                    <button type="submit" class="btn btn-primary float-right">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Enter Product Details</strong></h2>
                        </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-hover product_item_list c_table theme-color mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($dataa->images as $key => $img)

                                        @php
                                            $countt=$dataa->images->count();

                                        @endphp
                                        <tr>
                                            <td>{{ $key+1}}</td>
                                            <td><img src="{{ $img->image }}" height="70px" width="70px" alt=""></td>
                                            <td>
                                                <button type="button" imgid="{{ $img->id }}" id="updatimg"   class="btn btn-default waves-effect waves-float btn-sm waves-green" data-toggle="modal" data-target="#updateimage"><i class="zmdi zmdi-edit"></i></button>
                                                {{-- <a href="{{ route('imgcontroller.edit',$img->id) }}" class="btn btn-default waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-edit"></i></a></a> --}}
                                                @if ($countt>1)
                                                    <form enctype="multipart/form-data" action="{{ route('image.destroy',$img->id) }}" method="POST" style="display:inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                    <button type="submit" class="btn btn-default waves-effect waves-float btn-sm waves-red"><i class="zmdi zmdi-delete"></i></button></td>
                                                    </form>
                                                @endif

                                        </tr>
                                        <tr>

                                        @endforeach

                                    </tbody>

                                </table>
                                <br>
                                <button type="button" imgid="{{ $dataa->id }}" id="addimage"   class="btn btn-dander float-right" data-toggle="modal" data-target="#addnewimage">Add New</button>
                            </div>

                    </div>
                </div>
            </div>
            <div class="modal fade" id="updateimage" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Update Image</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="updateimageform" enctype="multipart/form-data">
                                @method('PUT')
                                <div class="contaner">
                                    <div class="row clearfix">
                                        <div class="form-control">
                                           <input type="file" name="image">
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="updateimagee" class="btn btn-default btn-round waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="addnewimage" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Update Image</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="addimagegform" action="{{ route('image.store') }}" enctype="multipart/form-data">

                                <div class="contaner">
                                    <div class="row clearfix">
                                        <div class="form-control">
                                            <input type="hidden" name="product_id" id="proid">
                                           <input type="file" multiple name="image[]">
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="updateimagee" class="btn btn-default btn-round waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
@endsection
@section('scripts')
<script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
{{-- <script src="{{ asset('assets/plugins/multi-select/js/jquery.multi-select.js') }}"></script> --}}
<script src="{{ asset('assets/js/pages/forms/advanced-form-elements.js') }}"></script>
<script>
    $(document).ready(function()
    {
        $('#updatimg').click(function()
        {
            var id=$(this).attr('imgid');
            $('#updateimageform').attr('action','{{ route('image.update','') }}'+'/'+id);
        })

        $('#addimage').click(function(){
            var id=$(this).attr('imgid');
            $('#proid').val(id);

            // $('#addimagegform').attr('action','{{ route('image.show','') }}'+'/'+id);
        });
    });
</script>
@endsection
