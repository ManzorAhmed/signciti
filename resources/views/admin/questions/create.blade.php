@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Dashboard</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('questions.index') }}">Manage Questions</a></li>
                    <li class="active">Add Question</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    @include('admin.partials._msg')
                    <h3 class="box-title m-b-0">Add Question</h3>
                    {{ Form::open([ 'route' => 'questions.store','class'=>'form-horizontal']) }}
                    <div class="form-group {{ $errors->has('question') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Question</label>
                        <div class="col-sm-6">
                                <textarea name="question" id="question" rows="2" placeholder="Enter Question" value="{{old('question')}}"
                                          class="form-control"></textarea>
                            <span class="text-danger">{{ $errors->first('question') }}</span>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('answer') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Answer</label>
                        <div class="col-sm-6">
                                <textarea name="answer" id="answer" rows="5" placeholder="Enter Answer" value="{{old('answer')}}"
                                          class="form-control"></textarea>
                            <span class="text-danger">{{ $errors->first('answer') }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Published</label>
                        <div class="col-sm-4">
                            <input type="checkbox" checked class="js-switch" data-color="#99d683" name="status"
                                   value="1"/>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-4 text-center">
                            <a href="{{ route('questions.index') }}" class="btn btn-info waves-effect waves-light
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
