@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('fonts.index') }}">Manage Fonts</a></li>
                    <li class="active">Add Font</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    @include('admin.partials._msg')
                    <h3 class="box-title m-b-0">Add Font</h3>
                    {{ Form::open([ 'route' => 'fonts.store','class'=>'form-horizontal']) }}
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-4">
                            {{ Form::text('name', null, ['class' => 'form-control','id'=>'name','placeholder'=>'Enter Name']) }}
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('approx_width') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Approx. Width</label>
                        <div class="col-sm-4">
                            {{ Form::text('approx_width', null, ['class' => 'form-control','id'=>'approx_width','placeholder'=>'Enter Approx Width']) }}
                            <span class="text-danger">{{ $errors->first('approx_width') }}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-4 text-center">
                            <a href="{{ route('fonts.index') }}" class="btn btn-info waves-effect waves-light
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
        <!-- /.row -->
    </div>
@stop
