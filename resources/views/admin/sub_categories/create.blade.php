@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Sub Categories</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('categories.index') }}">Manage Sub Categories</a></li>
                    <li class="active">Add Sub Categories</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                @include('admin.partials._msg')
                <div class="white-box">
                    <h3 class="box-title m-b-0">Add Sub Category</h3>
                    {{ Form::open([ 'route' => 'sub-categories.store','class'=>'form-horizontal generalForm', 'enctype'=>'multipart/form-data' ]) }}
                    <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Select Category</label>
                        <div class="col-sm-4">
                            <select name="category"
                                    class="form-control {{ $errors->has('category') ? 'has-error' : '' }} category">
                                @foreach($categories as $index=>$value)
                                    <option value="{{$value}}">
                                        {{$index}}
                                    </option>
                                @endforeach
                                <span class="text-danger">{{ $errors->first('category') }}</span>
                                <div class="clearfix"></div>
                            </select>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-4">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Sub Category Name">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}" id="district">
                        <label class="col-sm-3 control-label">Image</label>
                        <div class="col-sm-4">
                            <input type="file" name="image" class="form-control">
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    {{--<div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Select Parent Category</label>
                        <div class="col-sm-4">
                            {{ Form::select('category_id',$categories, null, ['class' => 'custom-select  custom-select-sm
                               form-control category_id']) }}
                            @error('category_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>--}}
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-4 text-center">
                            <a href="{{ route('categories.index') }}" class="btn btn-info waves-effect waves-light
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
@section("scripts")
    <script type="text/javascript">
        $('.generalForm').submit(function () {
            $('body').LoadingOverlay("show");
            $("#generalForm").submit();
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".category").select2({
                    placeholder: "Please select a Category",
                    allowClear: true
                }
            )
        });
    </script>
@endsection
