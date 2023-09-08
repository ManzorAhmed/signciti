@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Manage Orders</h4></div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{ route('orders.index') }}">Dashboard</a></li>
                    <li class="active">Order Details</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-sm-12">
                @include('admin.partials._msg')
                <div class="white-box">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="h3 font-weight-bolder text-center">Order Details</div>
                            <table class="table table-responsive">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="h4">Order No</div>
                                    </td>
                                    <td>
                                        {{$order->order_no}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="h4">Order Status</div>
                                    </td>
                                    <td>
                                        @if ($order->order_status == "pending")
                                            <span class="btn btn-warning">PENDING</span>
                                        @elseif ($order->order_status == "cancelled")
                                            <span class="btn btn-danger">CANCELLED</span>
                                        @elseif ($order->order_status == "completed")
                                            <span class="btn btn-success">COMPLETED</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="h4">Payment Status</div>
                                    </td>
                                    <td>
                                        @if ($order->payment_status == "pending")
                                            <span class="btn btn-warning">PENDING</span>
                                        @elseif ($order->payment_status == "cancelled")
                                            <span class="btn btn-danger">CANCELLED</span>
                                        @elseif ($order->payment_status == "completed")
                                            <span class="btn btn-success">COMPLETED</span>
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <div class="h3 font-weight-bolder text-center">Billing Address</div>
                            <table class="table table-responsive">
                                <tbody>
                                <tr>
                                    <th>
                                        Email
                                    </th>
                                    <td>
                                        {{$billing_address->email}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <td>
                                        {{$billing_address->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Company
                                    </th>
                                    <td>
                                        {{$billing_address->company}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Address
                                    </th>
                                    <td>
                                        {{$billing_address->address}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        City
                                    </th>
                                    <td>
                                        {{$billing_address->city}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        State
                                    </th>
                                    <td>
                                        {{$billing_address->state}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Zip Code
                                    </th>
                                    <td>
                                        {{$billing_address->zip_code}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Country
                                    </th>
                                    <td>
                                        {{$billing_address->country}}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Telephone
                                    </th>
                                    <td>
                                        {{$billing_address->telephone}}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-responsive">
                                <tbody>
                                @foreach($order_items as $product_id=>$value)
                                    @php $product = \App\Product::findorfail($product_id); @endphp
                                    <tr>
                                        <td>
                                            <div class="h4">Product Name</div>
                                        </td>
                                        <td>
                                            <div class="h4">{{$product->name}}</div>
                                        </td>
                                    </tr>
                                    @foreach($value as $k=>$v)
                                        @if($v['Text']!=null)
                                            @foreach($v as $s=>$y)
                                                @if($k=='row1' && $y!=null)
                                                    <tr>
                                                        <th>{{$s}}</th>
                                                        <td>{{$y}}</td>
                                                    </tr>
                                                @endif
                                                @if($k=='row2' && $y!=null)
                                                    <tr>
                                                        <th>{{$s}}</th>
                                                        <td>{{$y}}</td>
                                                    </tr>
                                                @endif
                                                @if($k=='row3' && $y!=null)
                                                    <tr>
                                                        <th>{{$s}}</th>
                                                        <td>{{$y}}</td>
                                                    </tr>
                                                @endif
                                                @if($k=='row4' && $y!=null)
                                                    <tr>
                                                        <th>{{$s}}</th>
                                                        <td>{{$y}}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            @if($order->id)
                                <div class="h3 font-weight-bolder text-center">Shipping Address</div>
                                <table class="table table-responsive">
                                    <tbody>
                                    <tr>
                                        <th>Email
                                        </th>
                                        <td>{{$billing_address->email}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Name
                                        </td>
                                        <td>{{$billing_address->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Company
                                        </td>
                                        <td>
                                            {{$billing_address->company}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Address
                                        </td>
                                        <td>
                                            {{$billing_address->address}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            City
                                        </td>
                                        <td>
                                            {{$billing_address->city}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            State
                                        </td>
                                        <td>
                                            {{$billing_address->state}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Zip Code
                                        </td>
                                        <td>
                                            {{$billing_address->zip_code}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Country
                                        </td>
                                        <td>
                                            {{$billing_address->country}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Telephone
                                        </td>
                                        <td>
                                            {{$billing_address->telephone}}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
@endsection
@stop
