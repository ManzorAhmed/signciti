@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Categories</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('categories.index') }}">Manage Categories</a></li>
                    <li class="active">Edit Categories</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                @include('admin.partials._msg')
                <div class="white-box">
                    <h3 class="box-title m-b-0">Edit Inner Sub Category -> {{ $categories->name }}</h3>
                    {{ Form::model($categories, ['method' => 'PATCH','route' => ['inner-sub-categories.update', $categories->id],'class'=>'form-horizontal generalForm','enctype'=>'multipart/form-data']) }}
                    <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Select Category</label>
                        <div class="col-sm-4">
                            <select name="category"
                                    class="form-control {{ $errors->has('category') ? 'has-error' : '' }} category">
                                @foreach($all_categories as $index=>$value)
                                    <option value="@if($value==$categories->id){{'selected'}}@endif">
                                        {{$index}}
                                    </option>
                                @endforeach
                                <span class="text-danger">{{ $errors->first('category') }}</span>
                                <div class="clearfix"></div>
                            </select>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}" id="district">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-4">
                            {{ Form::text('name', null, ['class' => 'form-control','id'=>'name','placeholder'=>'Enter Category Name']) }}
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}" id="district">
                        <label class="col-sm-3 control-label">Image</label>
                        <div class="col-sm-4">
                            <input type="file" name="image" class="form-control">
                            @if(File::exists('uploads/images/'.$categories->image))
                                <img src="{{asset('uploads/images/'.$categories->image)}}"
                                     style=" width:120px;max-width:100%;margin-top:12px"/>
                            @endif
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-4 text-center">
                            <a href="{{ route('categories.index') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-t-10">
                                <i class="fa fa-check"></i> Update
                            </button>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>

        <!-- /.row -->
    </div>
@stop
@section("scripts")
    <script>
        $(document).ready(function () {
            $(".category").select2({
                    placeholder: "Please select a Category",
                    allowClear: true
                }
            )
        });
    </script>
    <script type="text/javascript">
        $('.generalForm').submit(function () {
            $('body').LoadingOverlay("show");
            $("#generalForm").submit();
        });
    </script>

@endsection
