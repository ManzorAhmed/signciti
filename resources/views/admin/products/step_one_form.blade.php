@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('products.index') }}">Manage Products</a></li>
                    <li class="active">Add Products</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                @include('admin.partials._msg')
                <div class="white-box">
                    <h3 class="box-title m-b-5">Add Products</h3>
                    {{ Form::open([ 'route' => 'products.store','class'=>'form-horizontal generalForm', 'enctype'=>'multipart/form-data']) }}
                    <div class="col-sm-6">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                                <label class="control-label">Select Category</label>
                                <select name="category" id="category" class="form-control category">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('category') }}</span>
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group {{ $errors->has('sub_category') ? 'has-error' : '' }}">
                                <label class="control-label">Select Sub Category</label>
                                <select name="sub_category" id="sub_category" class="form-control sub_category">
                                </select>
                                <span class="text-danger">{{ $errors->first('sub_category') }}</span>
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group {{ $errors->has('inner_sub_category') ? 'has-error' : '' }}">
                                <label class="control-label">Select Inner Category</label>
                                <select name="inner_sub_category" id="inner_sub_category"
                                        class="form-control inner_sub_category">
                                </select>
                                <span class="text-danger">{{ $errors->first('inner_sub_category') }}</span>
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label class="control-label">Name</label>
                                <input type="text" name="name" value="{{old('name')}}"
                                       class="form-control @error('name') is-invalid @enderror"
                                       autocomplete="price" autofocus min="0" id="price"
                                       placeholder="Enter Name">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <label class="control-label" for="description">Description</label>
                                <textarea placeholder="Enter Description" name="description" rows="5"
                                          class="form-control @error('description') is-invalid @enderror" autofocus
                                          id="description">{{old('description')}}</textarea>
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                <label class="control-label" for="image">Upload Feature Image</label>
                                <input type="file" class="form-control" name="image">
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-2">
                            <div class="form-group">
                                <label class="control-label">Published</label>
                                <input type="checkbox" checked class="js-switch" data-color="#99d683"
                                       name="status"
                                       value="1"/>
                            </div>
                        </div>
                        <div class="files">

                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-offset-3 col-sm-4 text-center">
                                <a href="{{ route('products.index') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                                <button type="submit"
                                        class="btn btn-success waves-effect waves-light m-t-10 submit">
                                    <i class="fa fa-check"></i> Save
                                </button>
                            </div>
                        </div>
                    </div>
                    {{Form::close()}}
                    <div class="col-sm-5">
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label class="control-label">Upload Slider Images</label>
                            <form action="{{ route('admin.saveProductsImages') }}" file="true"
                                  enctype='multipart/form-data' class='dropzone' id='imageUpload'>
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dropzone.min.css') }}">
@endsection
@section('scripts')
    <script type="text/javascript" charset="utf8" src="{{ asset('js/dropzone.min.js') }}"></script>
    <!-- Adding a script for dropzone -->
    <script>
        Dropzone.options.imageUpload = {
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            parallelUploads: 5,
            maxFilesize: 2,
            maxFiles: 10,
            addRemoveLinks: true,
            dictRemoveFile: 'Remove',
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            removedfile: function (file, done) {
                var name = file.name;
                if (name) {
                    $.ajax({
                        headers: {
                            'X-CSRF-Token': $('input[name="_token"]').val()
                        }, //passes the current token of the page to image url
                        type: 'GET',
                        url: "remove/" + name,  //passes the image name to  the method handling this url to //remove file
                        dataType: 'json',
                        success: function (data) {
                            var id = "#";
                            id += data.id;
                            console.log(id);
                            $(id).remove();
                        }
                    });
                }

                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            },
            success: function (file, done) {
                var data = "";
                var value = "";
                value += done.imageName;
                data += "<input type='hidden' value='" + value + "' name='uploadedImages[]' id='" + done.id + "'>";
                $(".files").append(data);
                //localStorage.setItem("file", done.success);

            }
        };
    </script>
    <script type="text/javascript">
        $('.generalForm').submit(function () {
            $('body').LoadingOverlay("show");
            $(".generalForm").submit();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".category").select2({
                    placeholder: "Select Categories",
                    allowClear: true
                }
            );
            $(".sub_category").select2({
                    placeholder: "Select Categories",
                    allowClear: true
                }
            );
            $(".inner_sub_category").select2({
                    placeholder: "Select Categories",
                    allowClear: true
                }
            );
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="category"]').on('change', function () {
                var category_id = $(this).val();
                $('.sub_category').LoadingOverlay("show");
                if (category_id) {
                    $.ajax({
                        url: '/admin/select-sub-categories/ajax/' + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="sub_category"]').empty();
                            $('select[name="inner_sub_category"]').empty();
                            console.log(data)
                            $('select[name="sub_category"]').append('<option selected disabled>' + "Select Sub Category" + '</option>');
                            $.each(data, function (key, value) {
                                $('select[name="sub_category"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }

                    });
                    $('.sub_category').LoadingOverlay("hide");
                } else {
                    $('select[name="sub_category"]').empty();
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name="sub_category"]').on('change', function () {
                var sub_category_id = $(this).val();
                $('.inner_sub_category').LoadingOverlay("show");
                if (sub_category_id) {
                    $.ajax({
                        url: '/admin/select-inner-sub-categories/ajax/' + sub_category_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="inner_sub_category"]').empty();
                            $('select[name="inner_sub_category"]').append('<option selected disabled>' + "Select Inner Sub Category" + '</option>');
                            $.each(data, function (key, value) {
                                $('select[name="inner_sub_category"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }

                    });
                    $('.inner_sub_category').LoadingOverlay("hide");
                } else {
                    $('select[name="inner_sub_category"]').empty();
                }
            });
        });
    </script>
@endsection
