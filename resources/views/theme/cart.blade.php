@extends('theme.layouts.master')
@section('content')
    <div class="container bg-white">
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('success_message'))
                    <div class="alert alert-success alert-dismissable pt-md-3">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ Session::get('success_message') }}
                    </div>
                @endif
                @if(session('cart')!=null)
                @foreach(session('cart') as $product_id=>$value)
                    <?php $product=\App\Product::findorfail($product_id); ?>
                    <?php
                    $price1 = ($value['row1']['Price']);
                    $price2 = ($value['row2']['Price']);
                    $price3 = ($value['row3']['Price']);
                    $price4 = ($value['row4']['Price']);
                    $total_price = $price1 + $price2 + $price3 + $price4;
                    ?>
                    <table class="table table-responsive">
                        <tbody>
                        <tr>
                            <td rowspan="2">
                                <img src="{{asset('uploads/products/'.$product->image)}}" width="200"/>
                            </td>
                            <td>
                                <h3 class="text-center">{{$product->name}}</h3>
                            </td>
                            <td class="pull-right">
                                Edit|<a href="{{route('product.remove_cart',$product->id)}}">Remove</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="pull-right">
                                    <h5>Item Price</h5> <span>{{$total_price}}</span>
                                </div>
                            </td>
                        </tr>
                        @foreach($value as $k=>$v)
                            @if($v['Text']!=null)
                            @foreach($v as $s=>$y)
                                @if($k=='row1' && $y!=null)
                                    <tr>
                                        <td>{{$s}}</td>
                                        <td>{{$y}}</td>
                                    </tr>
                                @endif
                                @if($k=='row2' && $y!=null)
                                    <tr>
                                        <td>{{$s}}</td>
                                        <td>{{$y}}</td>
                                    </tr>
                                @endif
                                @if($k=='row3' && $y!=null)
                                    <tr>
                                        <td>{{$s}}</td>
                                        <td>{{$y}}</td>
                                    </tr>
                                @endif
                                @if($k=='row4' && $y!=null)
                                    <tr>
                                        <td>{{$s}}</td>
                                        <td>{{$y}}</td>
                                    </tr>
                                @endif
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                @endforeach
                @else
                    <p class="pt-md-3">Your cart is empty. There is no item in your cart.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
