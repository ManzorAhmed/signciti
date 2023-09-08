@extends('admin.layouts.master')
@section('stylesheets')
    <link rel="stylesheet" href="{{asset('plugins/bower_components/summernote/dist/summernote.css')}}">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Blogs</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('blog-posts.index') }}">Manage Blogs</a></li>
                    <li class="active">Edit Blogs</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                @include('admin.partials._msg')
                <div class="white-box">
                    <h3 class="box-title m-b-0">Edit Blogs</h3>
                    {{ Form::model($post, ['method' => 'PATCH','route' => ['blog-posts.update', $post->id],'class'=>'form-horizontal generalForm','enctype'=>'multipart/form-data'])}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Category</label>
                        <div class="col-sm-4">
                            <select class="form-control categories {{ $errors->has('title') ? 'has-error' : '' }}" id="categories" name="categories">
                                <option value="">Select Category</option>
                                @foreach($categories as $index=>$value)
                                <option value="{{$index}}" {{ $index == $post->blog_category_id ? 'selected' : '' }}>{{$value}}</option>
                                @endforeach
                            </select>
{{--                            {{ Form::select('categories',$categories, null, ['class' => 'custom-select  custom-select-sm form-control categories']) }}--}}
                            @error('categories')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Title</label>
                        <div class="col-sm-4">
                            {{ Form::text('title', null, ['class' => 'form-control','id'=>'title','placeholder'=>'Enter Title']) }}
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('paragraph1') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Paragraph One</label>
                        <div class="col-sm-7">
                            <textarea name="paragraph1" rows="4" id="paragraph1"
                                      class="form-control paragraph1">{{$post->paragraph1}}</textarea>
                            @error('paragraph1')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('paragraph2') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Paragraph Two</label>
                        <div class="col-sm-7">
                            <textarea name="paragraph2" rows="4" id="paragraph2"
                                      class="form-control paragraph2">{{$post->paragraph2}}</textarea>
                            @error('paragraph2')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('paragraph3') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Paragraph Three</label>
                        <div class="col-sm-7">
                            <textarea name="paragraph3" rows="4" id="paragraph3"
                                      class="form-control paragraph3">{{$post->paragraph3}}</textarea>
                            @error('paragraph3')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('featured_image') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Featured Image</label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control" name="featured_image" id="featured_image"/>
{{--                            <span><img src="{{asset('uploads/'.$post->feature_image}}" alt="Image is not found" /></span>--}}
                            @if(File::exists('uploads/post/'.$post->featured_image))
                                <img src="{{asset('uploads/post/'.$post->featured_image)}}"
                                     style=" width:120px;max-width:100%;margin-top:12px" alt="Image is not found."/>
                            @else
                                <img src="{{asset('uploads/placeholder.jpg')}}" style=" width:120px;max-width:100%;margin-top:12px"
                                     alt="Image is not found."/>
                            @endif
                            <span class="text-danger">{{ $errors->first('featured_image') }}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('blog_image') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Blog Image</label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control" name="blog_image" id="blog_image"/>
                            @if(File::exists('uploads/post/'.$post->blog_image))
                                <img src="{{asset('uploads/post/'.$post->blog_image)}}"
                                     style=" width:120px;max-width:100%;margin-top:12px" alt="Image is not found."/>
                            @else
                                <img src="{{asset('uploads/placeholder.jpg')}}" style=" width:120px;max-width:100%;margin-top:12px"
                                     alt="Image is not found."/>
                            @endif
                            <span class="text-danger">{{ $errors->first('featured_image') }}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('blog_image2') ? 'has-error' : '' }}">
                        <label class="col-sm-3 control-label">Blog Image Two</label>
                        <div class="col-sm-4">
                            <input type="file" class="form-control" name="blog_image2" id="blog_image2"/>
                            @if(File::exists('uploads/post/'.$post->blog_image2))
                                <img src="{{asset('uploads/post/'.$post->blog_image2)}}"
                                     style=" width:120px;max-width:100%;margin-top:12px" alt="Image is not found."/>
                            @else
                                <img src="{{asset('uploads/placeholder.jpg')}}" style=" width:120px;max-width:100%;margin-top:12px"
                                     alt="Image is not found."/>
                            @endif
                            <span class="text-danger">{{ $errors->first('blog_image2') }}</span>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Status</label>
                        <div class="col-sm-4">
                            <input type="checkbox" class="js-switch" data-color="#99d683"
                                   name="status"  value="1" {{ ($post->status) ?'checked':'' }} />
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-4 text-center">
                            <a href="{{ route('blog-posts.index') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-t-10">
                                <i class="fa fa-check"></i> Update</button>
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
    <script type="text/javascript" src="{{asset('plugins/bower_components/summernote/dist/summernote.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var options = {
                height: 350
            };
            $('#content').summernote(options);
        });
    </script>
    <script type="text/javascript">
        $('.generalForm').submit(function () {
            $('body').LoadingOverlay("show");
            $("#generalForm").submit();
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".categories").select2({
                    placeholder: "Please select a Category",
                    allowClear: true
                }
            )
        });
        $(document).ready(function () {
            $(".tags").select2({
                    placeholder: "Please select a Tag",
                    allowClear: true
                }
            )
        });
    </script>
@endsection
