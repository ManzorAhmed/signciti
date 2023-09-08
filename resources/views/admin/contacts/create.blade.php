@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Contacts</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('contacts.index') }}">Manage Contact</a></li>
                    <li class="active">Add Contacts</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                @include('admin.partials._msg')
                <div class="white-box">
                    <h3 class="box-title m-b-0">Add Contact</h3>
                    {{ Form::open([ 'route' => 'contacts.store','class'=>'form-horizontal generalForm', 'enctype'=>'multipart/form-data']) }}
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}" id="district">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-4">
                            {{ Form::text('name', null, ['class' => 'form-control','id'=>'name','placeholder'=>'Enter Name']) }}
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}" id="district">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-4">
                            {{ Form::email('email', null, ['class' => 'form-control','id'=>'email','placeholder'=>'Enter Email']) }}
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}" id="district">
                        <label class="col-sm-3 control-label">Subject</label>
                        <div class="col-sm-4">
                            {{ Form::text('subject', null, ['class' => 'form-control','id'=>'email','placeholder'=>'Enter Subject']) }}
                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}" id="district">
                        <label class="col-sm-3 control-label">Message</label>
                        <div class="col-sm-4">
                            {{ Form::textarea('message', null, ['class' => 'form-control','id'=>'message','placeholder'=>'Enter Message']) }}
                            <span class="text-danger">{{ $errors->first('message') }}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-4 text-center">
                            <a href="{{ route('contacts.index') }}" class="btn btn-info waves-effect waves-light
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
@endsection
