
@extends('admin.admindashboard')
@section('heading')
All Categories
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
@endsection
@section('content')
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-hover product_item_list c_table theme-color mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Color Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no=1;
                                    @endphp
                                    @foreach ($color as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td><h5>{{ $data->name }}</h5></td>
                                        <td>
                                            {{-- <button type="button" id="editcategorybutton" catid="{{ $data->id }}" name="{{ $data->name }}" description="{{ $data->description }}" tagsatr="{{ $data->tags }}" class="btn btn-default waves-effect waves-float btn-sm waves-green" data-toggle="modal" data-target="#editcategorymodel"><i class="zmdi zmdi-edit"></i></button> --}}
                                            {{-- <a href="{{ route('prodcuct.edit',$data->id) }}" class="btn btn-default waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-edit"></i></a></a> --}}
                                            <form action="{{ route('color.destroy',$data->id) }}" method="POST" style="display:inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="category_id" value="{{ $data->id }}">
                                                <button type="submit" class="btn btn-default waves-effect waves-float btn-sm waves-red"><i class="zmdi zmdi-delete"></i></button>
                                            </form>

                                            {{-- </form>
                                            <a href="{{ route('deletecategory',$data->id) }}">Delete</a> --}}

                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <ul class="pagination pagination-primary m-b-0">
                                <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-left"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Model  --}}

                <div class="modal fade" id="editcategorymodel" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="title" id="defaultModalLabel">Update Category</h4>
                            </div>
                            <div class="modal-body">
                                <form method="POST" id="editcategory" enctype="multipart/form-data">
                                    @method('PUT')
                                    <div class="contaner">
                                        <div class="row clearfix">
                                            <div class="form-control">
                                                <label for="name">Enter Name</label>
                                                <input type="text" id="mname" class="form-control" name="name">

                                                <label for="name" class="mt-3">Description</label>
                                                <textarea rows="4" name="description" id="mdescription" class="form-control no-resize" placeholder="Please type what you want..."></textarea>

                                                <label for="name" class="mt-3">Tags</label>
                                                    <input type="text" name="tags" id="mtag" class="form-control" data-role="tagsinput"><br>


                                                <label for="name" class="mt-3">image</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default btn-round waves-effect">SAVE CHANGES</button>
                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

@endsection
@section('scripts')
<script src="{{ asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<script>
    // $.noConflict();
    // $(document).ready(function(){
    //  $("#editcategorybutton").click(function(){

    //      var id=$(this).attr('catid');
    //      var name=$(this).attr('name');
    //      var description=$(this).attr('description');
    //      var tags=$(this).attr('tagsatr');
    //     //  alert(tags);

    //      $('#mname').val(name);
    //      $('#mdescription').val(description);
    //      $('#mtag').tagsinput('add',tags );
    //     //  $('#mtag').val(1234);
    //     //  $('#mtags').tagsinput(tags);
    //      $('#editcategory').attr('action','{{ route('category.update','') }}'+'/'+id);
    //  });
    //    });
   </script>
@endsection
