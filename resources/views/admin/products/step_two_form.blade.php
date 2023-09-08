@extends('admin.layouts.master')
{{--@section('stylesheet')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
        <link rel="stylesheet" href="{{asset('theme/css/form_styles.css')}}">
    <style>
        label {
            font-weight: 600;
        }
    </style>
@endsection--}}
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
                    @include('admin.partials._msg')
                    <h3 class="box-title m-b-5">Step Two: Add Height and Thickness</h3>
                    {{ Form::open([ 'route' => 'form_two','class'=>'form-horizontal generalForm','id'=>'dropzone', 'enctype'=>'multipart/form-data']) }}
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="row mt-5">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <h2 class="m-t-40 text-center">Height</h2>
                                    <div class="height_error m-t-15">

                                    </div>
                                    <button class="btn btn-sm btn-success pull-right btn_height"><i
                                            class="fa fa-plus fa-1x"></i></button>
                                    <div class="height m-t-5">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    <h2 class="m-t-40 text-center">Thickness</h2>
                                    <div class="thickness_error m-t-15">

                                    </div>
                                    <button class="btn btn-sm btn-success pull-right btn_thickness"><i
                                            class="fa fa-plus fa-1x"></i></button>
                                    <div class="thickness m-t-5">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-4 text-center">
                            <a href="{{ route('products.index') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-t-10">
                                <i class="fa fa-check"></i> Save
                            </button>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>

@endsection
@section('stylesheets')
@endsection
@section('scripts')
    <script type="text/javascript">
        $('.generalForm').submit(function () {
            $('body').LoadingOverlay("show");
            $(".generalForm").submit();
        });
    </script>
    <script type="text/javascript">
        var height_count = 0;
        var thickness_count = 0;
        $('.btn_height').click(function (e) {
            e.preventDefault();
            height_count++;
            console.log(height_count);
            if (height_count > 75) {
                var error = "<div class='alert alert-danger alert-dismissable'>" +
                    "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>More than 75 heights are not allowed</div>";
                $('.height_error').html(error);
                return null;
            } else {
                var markup = "";
                markup += "<label>Height</label>" +
                    "<input class='form-control' type='text' placeholder='Enter Height' name='height[]'>";
                $('.height').append(markup);
            }

        });
        $('.btn_thickness').click(function (e) {
            e.preventDefault();
            thickness_count++;
            console.log(thickness_count);

            if (thickness_count > 10) {
                var error = "<div class='alert alert-danger alert-dismissable'>" +
                    "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>More than 10 thickness are not allowed</div>";
                $('.thickness_error').html(error);
                return null;
            } else {
                var markup = "";
                markup += "<label>Thickness</label>" +
                    // "<button class='btn btn-sm btn-success pull-right btn_thickness'><i class='fa fa-plus fa-1x'></i></button>" +
                    "<input class='form-control' type='text' placeholder='Enter Thickness' name='thickness[]'>";
                $('.thickness').append(markup);
            }
        });
    </script>
@endsection


