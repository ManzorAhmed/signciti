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
                <div class="white-box">
                    <div class="container">
                        @include('admin.partials._msg')
                        <h3 class="box-title m-b-0">Edit Products</h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                    <label class="control-label">Upload Slider Images</label>
                                    <form action="{{ route('admin.saveProductsImages') }}" file="true"
                                          enctype='multipart/form-data' class='dropzone' id='imageUpload'>
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                                <div class="row">
                                    @foreach($product->images as $image)
                                        <div class="col-sm-2">
                                            <img src="{{asset('uploads/products/'.$image->image)}}"
                                                 alt="Image is not found." width="100"/>
                                            <div>
                                                <a href='{{route('admin.delete_product_image',$image->id)}}'
                                                   class='btn btn-danger btn-xs'>Remove</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{ Form::model($product, ['method' => 'PATCH','route' => ['products.update', $product->id],'class'=>'form-horizontal generalForm','enctype'=>'multipart/form-data'])}}
                        {{-- @php
                             if ($product->product_type === 'App\InnerSubCategory'){
                                 $inner_sub_category=\App\InnerSubCategory::findorfail($product->product_id);
                                 $sub_category=\App\SubCategory::findorfail($inner_sub_category->sub_category_id);
                                 $category=\App\Category::findorfail($sub_category->id);
                             }
                             elseif($product->product_type === 'App\SubCategory'){
                                 $sub_category=\App\SubCategory::findorfail($product->product_id);
                                 $category=\App\Category::findorfail($sub_category->id);
                             }
                             elseif($product->product_type === 'App\Category'){
                                 $category=\App\Category::findorfail($product->product_id);
                             }
                         @endphp--}}
                        <div class="row">
                            <div class="col-md-12">
                                {{--<div class="col-md-8 col-md-offset-2">
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
                                        <input type="text" name="name" value="{{$product->name}}"
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
                                                  id="description">{{$product->description}}</textarea>
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                        <label class="control-label" for="image">Upload Feature Image</label>
                                        <input type="file" class="form-control" name="image">
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    </div>
                                    @if(File::exists('uploads/products/'.$product->image))
                                        <img src="{{asset('uploads/products/'.$product->image)}}" width="100"/>
                                    @endif
                                </div>
                                <div class="col-md-5 col-md-offset-2">
                                    <div class="form-group">
                                        <label class="control-label">Published</label>
                                        <input type="checkbox" class="js-switch" data-color="#99d683"
                                               name="status" value="1" {{ ($product->status) ?'checked':'' }} />
                                    </div>
                                </div>
                                <div class="files">

                                </div>
                            </div>
                        </div>
                       {{-- @php
                            $selected_inner_sub_categories=$product->categories;
                            foreach($selected_inner_sub_categories as $r){
                                sub_categories=\App\SubCategory::findorfail($r->sub_category_id);
                            }
                        @endphp--}}
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
                                            <i class="fa fa-check"></i> Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{Form::close()}}
                    </div>

                </div>

            </div>
        </div>
        <!-- /.row -->
    </div>
@endsection
@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dropzone.min.css') }}">
@endsection
@section('scripts')
    <script type="text/javascript" charset="utf8" src="{{ asset('js/dropzone.min.js') }}"></script>
    <script>
        Dropzone.options.imageUpload = {
            uploadMultiple: false,
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            parallelUploads: 5,
            maxFilesize: 2,
            maxFiles: 5,
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

        Dropzone.options.new = {
            uploadMultiple: false,
            parallelUploads: 5,
            maxFilesize: 2,
            maxFiles: 5,
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
                data += "<input type='hidden' value='" + value + "' name='uploaded_v_Images[]' id='" + done.id + "'>";
                $(".v_files").append(data);
                //localStorage.setItem("file", done.success);

            }
        };

        $(document).ready(function () {
            $(".number-validation").keydown(function (e) {
                // Allow: backspace, delete, tab, escape, enter and .
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl/cmd+A
                    (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: Ctrl/cmd+C
                    (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: Ctrl/cmd+X
                    (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
                    // Allow: home, end, left, right
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                    // let it happen, don't do anything
                    return;
                }
                // Ensure that it is a number and stop the keypress
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        });

        $(".add_p").click(function () {
            $(".prices").append('<div class="col-md-8 col-md-offset-2">\n' +
                '                                        <button type="button" class="btn btn-danger btn-xs pull-right cross"><i class="fa fa-times"></i></button>\n' +
                '                                        <div class="form-group">\n' +
                '                                            <label>Name</label>\n' +
                '                                            <input type="text" class="form-control" name="c_name[]" required>\n' +
                '                                        </div>\n' +
                '                                        <div class="form-group">\n' +
                '                                            <label>Number</label>\n' +
                '                                            <input type="number" class="form-control num" name="c_number[]" required>\n' +
                '                                        </div>\n' +
                '                                        <div class="form-group">\n' +
                '                                            <label>Year</label>\n' +
                '                                            <input type="date" class="form-control " name="c_year[]" required>\n' +
                '                                        </div>\n' +
                '                                        <div class="form-group">\n' +
                '                                            <label>Price</label>\n' +
                '                                            <input type="number" class="form-control num" name="c_price[]" required>\n' +
                '                                        </div>\n' +
                '                                    </div>')
        });

        $(".add_q").click(function () {
            $(".questions").append('<div class="col-md-8 col-md-offset-2">\n' +
                '                                        <button type="button" class="btn btn-danger btn-xs pull-right cross"><i class="fa fa-times"></i></button>\n' +
                '                                        <div class="form-group">\n' +
                '                                            <label>Title</label>\n' +
                '                                            <input type="text" class="form-control" name="title_q[]" required>\n' +
                '                                        </div>\n' +
                '                                        <div class="form-group">\n' +
                '                                            <label>Description</label>\n' +
                '                                            <textarea name="answer[]" id="" class="form-control" rows="4" required></textarea>\n' +
                '                                        </div>\n' +
                '                                    </div>');
        });

        $(".add_k").click(function () {
            $(".keypoints").append('<div class="col-md-8 col-md-offset-2">\n' +
                '                                        <button type="button" class="btn btn-danger btn-xs pull-right cross"><i class="fa fa-times"></i></button>\n' +
                '                                        <div class="form-group">\n' +
                '                                            <label>Keypoint</label>\n' +
                '                                            <input type="text" class="form-control" name="keypoint[]" required>\n' +
                '                                        </div>\n' +
                '                                    </div>');
        });
        $("body").on('click', '.cross', function () {
            $(this).parent().remove();
        });

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
