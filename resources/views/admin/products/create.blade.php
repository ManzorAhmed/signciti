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
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                    <label class="control-label">Upload Slider Images</label>
                                    <form action="{{ route('admin.saveProductsImages') }}" file="true"
                                          enctype='multipart/form-data' class='dropzone' id='imageUpload'>
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{ Form::open([ 'route' => 'products.store','class'=>'form-horizontal generalForm', 'enctype'=>'multipart/form-data']) }}
                        <div class="row">
                            <div class="col-md-12">
                                {{-- <div class="col-md-8 col-md-offset-2">
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
                                 </div>--}}
                                <div class="col-md-5">
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label class="control-label">Name</label>
                                        <input type="text" name="name" value="{{old('name')}}"
                                               class="form-control @error('name') is-invalid @enderror"
                                               autocomplete="price" autofocus min="0" id="price"
                                               placeholder="Enter Name">
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-2">
                                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                        <label class="control-label" for="description">Description</label>
                                        <textarea placeholder="Enter Description" name="description" rows="5"
                                                  class="form-control @error('description') is-invalid @enderror"
                                                  autofocus
                                                  id="description">{{old('description')}}</textarea>
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                        <label class="control-label" for="image">Upload Feature Image</label>
                                        <input type="file" class="form-control" name="image">
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-5 col-md-offset-2">
                                    <div class="form-group">
                                        <label class="control-label">Published</label>
                                        <input type="checkbox" checked class="js-switch" data-color="#99d683"
                                               name="status"
                                               value="1"/>
                                    </div>
                                </div>
                                <div class="files">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-4 categories_div">
                                    <h3 class="text-center font-weight-bold">Select Category</h3>
                                    @foreach($categories as $key=>$value)
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" class="categories" name="categories[]"
                                                       value="{{$key}}"/>
                                                {{$value}}
                                            </label>
                                        </div>
                                    @endforeach
                                    <span class="text-danger">{{ $errors->first('categories') }}</span>
                                </div>
                                <div class="col-md-4">
                                    <div class="sub_categories_div">

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="inner_sub_categories_div">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group m-b-0">
                                    <div class="col-sm-12 text-center">
                                        <a href="{{ route('products.index') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                                        <button type="submit"
                                                class="btn btn-success waves-effect waves-light m-t-10 submit">
                                            <i class="fa fa-check"></i> Save
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    {{Form::close()}}
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
        var selectedCategories = [];
        $('.categories').click(function () {
            if ($(this).is(":checked")) {
                var value = $(this).val();
                selectedCategories.push(value);
            } else {
                var remove_Item = $(this).val();
                selectedCategories = $.grep(selectedCategories, function (value) {
                    return value != remove_Item;
                });
            }
            $('.sub_categories_div').LoadingOverlay("show");
            $('.inner_sub_categories_div').LoadingOverlay("show");
            if (selectedCategories.length !== 0) {
                $.ajax({
                    url: '/admin/select-sub-categories/ajax/',
                    type: "GET",
                    data: {categories: selectedCategories},
                    dataType: "json",
                    success: function (data) {
                        $('.sub_categories_div').empty();
                        $('.inner_sub_categories_div').empty();
                        $('.sub_categories_div').append(
                            '<h3 class="text-center">Select Sub Category</h3>'
                        )
                        $.each(data, function (key, value) {
                            var markup = '<div class="form-group">' +
                                '<label>' +
                                '<input type="checkbox" class="sub_categories" name="sub_categories[]" value="' + key + '"/>'
                                + value +
                                '</label>' +
                                '</div>'
                            $('.sub_categories_div').append(markup)
                        });
                    }
                });
            } else {
                $('.sub_categories_div').empty();
                $('.inner_sub_categories_div').empty();
            }
            $('.sub_categories_div').LoadingOverlay("hide");
            $('.inner_sub_categories_div').LoadingOverlay("hide");

        })
    </script>
    <script type="text/javascript">
        var selectedSubCategories = [];
        $('body').on('change', '.sub_categories', function () {
            // $('.sub_categories').click(function () {
            if ($(this).is(":checked")) {
                var value = $(this).val();
                selectedSubCategories.push(value);
            } else {
                var remove_Item = $(this).val();
                selectedSubCategories = $.grep(selectedSubCategories, function (value) {
                    return value != remove_Item;
                });
            }
            $('.inner_sub_categories_div').LoadingOverlay("show");
            if (selectedSubCategories.length !== 0) {
                $.ajax({
                    url: '/admin/select-inner-sub-categories/ajax/',
                    type: "GET",
                    data: {categories: selectedSubCategories},
                    dataType: "json",
                    success: function (data) {
                        $('.inner_sub_categories_div').empty();
                        $('.inner_sub_categories_div').append(
                            '<h3 class="text-center">Select Inner Sub Category</h3>'
                        )
                        $.each(data, function (key, value) {
                            var markup = '<div class="form-group">' +
                                '<label>' +
                                '<input type="checkbox" class="inner_sub_categories" name="inner_sub_categories[]" value="' + key + '"/>'
                                + value +
                                '</label>' +
                                '</div>'
                            $('.inner_sub_categories_div').append(markup)
                        });
                    }
                });
            } else {
                $('.inner_sub_categories_div').empty();
            }
            $('.inner_sub_categories_div').LoadingOverlay("hide");

        })
    </script>
@endsection
