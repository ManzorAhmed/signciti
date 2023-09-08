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
                    <h3 class="box-title m-b-5">Step Two: Add pricing for each height and thickness</h3>
                    {{ Form::open([ 'route' => 'form_three','class'=>'form-horizontal generalForm','id'=>'dropzone', 'enctype'=>'multipart/form-data']) }}
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="row mt-5">
                        <div class="col-md-3 col-md-offset-1">
                            <label>Select Height</label>
                            <select class="height form-control" name="height">
                                @foreach($height as $key=>$index)
                                    <option value="{{$index}}">{{$index}} Inch</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 col-md-offset-1">
                            <label>Select Thickness</label>
                            <select class="thickness form-control" name="thickness">
                                @foreach($thickness as $key=>$index)
                                    <option value="{{$index}}">{{$index}} Inch</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 col-md-offset-1">
                            <label>Price</label>
                            <input type="text" name="price" class="form-control">
                        </div>
                    </div>
                    <div class="form-group m-t-40">
                        <div class="col-sm-offset-3 col-sm-4 text-center">
                            <a href="{{ route('products.index') }}" class="btn btn-info waves-effect waves-light
                                 m-t-10"><i class="fa fa-backward"></i> Back</a>
                            <button type="submit" class="btn btn-success waves-effect waves-light m-t-10">
                                <i class="fa fa-check"></i> Save
                            </button>
                        </div>
                    </div>
                    {{Form::close()}}
                    <table cellspacing="0" cellpadding="0" class="table pmd-table table-responsive table-striped"
                           id="table-propeller">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col"></th>
                            @foreach($thickness as $key_thickness=>$value_thickness)
                                <th scope="col" style="text-align: center">{{$value_thickness}} Inch</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($height as $index=>$name)
                            <tr>
                                <th scope="row" width="100px">{{ $name }} Inch</th>
                                @foreach($thickness as $key_thickness=>$value_thickness)
                                    @php
                                        $pricing = App\Pricing::where('thickness',$value_thickness)
                                         ->where('height',$name)
                                         ->where('product_id',$product->id)
                                         ->get();
                                    @endphp
                                    @if($pricing->count() == 0)
                                        <td style="text-align: center"></td>
                                    @else
                                        @php $price=\App\Pricing::where('thickness',$value_thickness)
                    ->where('product_id',$product->id)
                    ->get();
                                        @endphp
                                        @foreach($price as $r)
                                            @if($name == $r->height && $value_thickness)
                                                <td style="text-align: center">$ {{number_format((float)$r->price, 2, '.', '')}}
                                                </td>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
        $(".height").select2({
                placeholder: "Select Height",
            }
        );
        $(".thickness").select2({
                placeholder: "Select Thickness",
            }
        );
    </script>

@endsection


