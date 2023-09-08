@extends('theme.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 m-auto bg-light">
                <div class="cart display-single-price">
                    <div class="page-title p-3 text-center">
                        <h1>Shopping Cart</h1>
                    </div>
                    <div class="row align-items-center justify-content-center mb-5 mt-md-5">

                        <div class="col-sm-4 mb-3 mb-sm-0">

                            <a style="text-decoration: none;" href="{{route('home')}}" title="Continue Shopping"

                               class="btn btn-light btn-lg bg-warning text-white btn-block btn-continue"

                               onclick=""><span><span>Continue Shopping</span></span></a>

                        </div>

                        <div class="col-sm-4">

                            <ul class="checkout-types top list-unstyled">

                                <li>

                                    <a style="text-decoration: none;" href="{{route('product.check_out')}}"
                                       title="Proceed to Checkout"

                                       class="button btn bg-danger btn-proceed-checkout btn-block btn-lg text-white"

                                       onclick=""><span><span>Proceed to Checkout</span></span></a>

                                </li>

                            </ul>

                        </div>

                    </div>
                    <?php
                    $sub_total = 0;
                    ?>
                    @if(session('cart')!=null)
                        <div class="card mb-3">
                            @if(Session::has('success_message'))
                                <div class="alert alert-success alert-dismissable mt-md-3">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                    {{ Session::get('success_message') }}
                                </div>
                            @endif
                            @foreach(session('cart') as $product_id=>$value)
                                <form method="post" action="{{route('product.update_price',$product_id)}}"
                                      class="mb-6">
                                    @csrf
                                    @if(session('quantity_cart')!=null)
                                        @php
                                            $res = array_key_exists($product_id, session('quantity_cart'));
                                            if ($res == true) {
                                                $quantity_cart=session('quantity_cart');
                                                $quantity_value=($quantity_cart[$product_id]['quantity']);
                                            }
                                        @endphp
                                    @endif
                                    <?php $product = \App\Product::findorfail($product_id);
                                    $price1 = ($value['row1']['Price']);
                                    $price2 = ($value['row2']['Price']);
                                    $price3 = ($value['row3']['Price']);
                                    $price4 = ($value['row4']['Price']);
                                    $item_price = $price1 + $price2 + $price3 + $price4;
                                    if (isset($quantity_value)) {
                                        $item_total = $quantity_value * $item_price;
                                    } else {
                                        $item_total = $item_price;
                                    }
                                    $sub_total = $sub_total + $item_total;
                                    $sub_total = session()->put('sub_total', $sub_total);
                                    $sub_total = session()->get('sub_total');
                                    $estimate = session()->get('estimate');
                                    $total = $estimate + $sub_total;
                                    $grand_total = $total;
                                    session()->put('grand_total', $grand_total);
                                    ?>
                                    <div class="row">
                                        <div class="col-md-12 col-lg-3 d-none d-sm-block">
                                            <div class="card-body">
                                                <a href="#"
                                                   title="{{$product->name}}" class="product-image">
                                                    <img class="img-fluid rounded"
                                                         src="{{asset('uploads/products/'.$product->image)}}"
                                                         alt="{{$product->name}}">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-9">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12 d-sm-none">
                                                        <div>
                                                            <a href="#" title="{{$product->name}}"
                                                               class="product-image">
                                                                <img class="img-fluid rounded"
                                                                     src="{{asset('uploads/products/'.$product->image)}}"
                                                                     alt="{{$product->name}}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row align-items-center">
                                                            <div class="col">
                                                                <div>
                                                                    <h4 class="my-2 product-name">
                                                                        <a href="{{route('product_calculator',$product->slug)}}">
                                                                            {{$product->name}}
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-auto">

                                                                {{--   <a href="{{route()}}" rel="nofollow" title="Edit item parameters"

                                                                      class="text-warning">Edit</a> | --}}
                                                                <a href="{{route('product.remove_cart',$product->id)}}"
                                                                   title="Remove Item"
                                                                   class="text-danger">Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div>
                                                        <table class="table table-shopping-cart">
                                                            <tbody>
                                                            <tr class="item-price-row">
                                                                <td class="cart-details">
                                                                    <a data-toggle="collapse"
                                                                       class="collapse-link collapsed text-warning"
                                                                       href="#collapse-{{$product_id}}">Details</a>
                                                                </td>
                                                                <th class="text-right cart-header">
                                                                    Item Price
                                                                </th>
                                                                <td class="text-right cart-values">
                                                                    <div class="product-cart-price"
                                                                         data-rwd-label="Price"
                                                                         data-rwd-tax-label="Excl. Tax">
                                                                            <span class="cart-price">
                                                                                <span
                                                                                    class="price">${{$item_price}}</span>
                                                                            </span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="collapse" id="collapse-{{$product_id}}">
                                                                <td colspan="3">
                                                                    <dl class="item-options">
                                                                        <dt>Enter Text</dt>
                                                                        <dd>
                                                                            @foreach($value as $k=>$v)
                                                                                @if($v['Text']!=null)
                                                                                    @foreach($v as $s=>$y)
                                                                                        @if($k=='row1' && $y!=null)
                                                                                            <strong>{{$s}}:</strong>
                                                                                            {{$y}}<br>
                                                                                        @endif
                                                                                        @if($k=='row2' && $y!=null)
                                                                                            <strong>{{$s}}:</strong>
                                                                                            {{$y}}<br>
                                                                                        @endif
                                                                                        @if($k=='row3' && $y!=null)
                                                                                            <strong>{{$s}}:</strong>
                                                                                            {{$y}}<br>
                                                                                        @endif
                                                                                        @if($k=='row4' && $y!=null)
                                                                                            <strong>{{$s}}:</strong>
                                                                                            {{$y}}<br>
                                                                                        @endif
                                                                                    @endforeach
                                                                                    <br>
                                                                                    <br>
                                                                                @endif
                                                                            @endforeach
                                                                        </dd>
                                                                    </dl>
                                                                </td>
                                                            </tr>
                                                            <tr class="item-quantities-row">
                                                                <td class="">
                                                                </td>
                                                                <th class="text-right">
                                                                    Quantity
                                                                </th>

                                                                <td class="text-right">

                                                                    <div class="input-group input-group-sm ml-auto"

                                                                         style="max-width: 146px !important;">

                                                                        <input type="text" pattern="\d*(\.\d+)?"
                                                                               value="@if(@isset($quantity_value)){{$quantity_value}}@else{{'1'}}@endif"
                                                                               name="quantity"
                                                                               size="4"
                                                                               data-cart-item-id="wdm_metal_natural_satin_aluminum_letters"
                                                                               title="Qty"
                                                                               class="input-text qty form-control"
                                                                               maxlength="12"
                                                                               style="margin-left: auto;">

                                                                        <div class="input-group-append">
                                                                            <button type="submit"
                                                                                    data-cart-item-update=""
                                                                                    value="update_qty"
                                                                                    title="Update"
                                                                                    class="btn bg-warning text-white border">
                                                                                Update
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr class="item-totals-row">
                                                                <td class="">
                                                                </td>
                                                                <th class="text-right">
                                                                    Item Total
                                                                </th>
                                                                <td class="text-right">
                                                                        <span class="cart-price">
                                                                            <span class="price">${{$item_total}}</span>
                                                                        </span>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-6 col-md-12 col-lg-4 order-last">
                                <form method="post" action="{{route('product.grand_total')}}">
                                    @csrf
                                    <input type="hidden" name="sub_total" value="{{$sub_total}}">
                                    <div class="cart-forms">
                                        <div class="shipping mb-4">
                                            <h4>Estimate Shipping</h4>
                                            <div class="shipping-form" id="shipping-form">
                                                <dl class="sp-methods">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            <div class="form-group form-check small-radio">


                                                                <input name="estimate_method" type="radio"

                                                                       value="19.99"

                                                                       id="s1_method_matrixrate_matrixrate_448"

                                                                       class="form-check-input radio" required>


                                                                <label class="form-check-label"

                                                                       for="s1_method_matrixrate_matrixrate_448">


                                                                    <span class="price">$19.99</span> - Standard (3-6

                                                                    Business Days + Manufacturing) </label>


                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="form-group form-check small-radio">
                                                                <input name="estimate_method" type="radio"
                                                                       value="36.99"
                                                                       id="s1_method_matrixrate_matrixrate_455"
                                                                       class="form-check-input radio" required>
                                                                <label class="form-check-label"
                                                                       for="s1_method_matrixrate_matrixrate_455">
                                                                    <span class="price">$36.99</span>- 3Day +
                                                                    Manufacturing
                                                                </label>
                                                            </div>
                                                        </li>


                                                        <li>


                                                            <div class="form-group form-check small-radio">


                                                                <input name="estimate_method" type="radio"

                                                                       value="44.99"

                                                                       id="s1_method_matrixrate_matrixrate_462"

                                                                       class="form-check-input radio" required>


                                                                <label class="form-check-label"

                                                                       for="s1_method_matrixrate_matrixrate_462">


                                                                    <span class="price">$44.99</span> - 2Day +

                                                                    Manufacturing

                                                                </label>


                                                            </div>


                                                        </li>

                                                        <li>

                                                            <div class="form-group form-check small-radio">

                                                                <input name="estimate_method" type="radio"

                                                                       value="51.99"

                                                                       id="s1_method_matrixrate_matrixrate_469"

                                                                       class="form-check-input radio" required>

                                                                <label class="form-check-label"

                                                                       for="s1_method_matrixrate_matrixrate_469">

                                                                    <span class="price">$51.99</span>- Overnight +

                                                                    Manufacturing</label>

                                                            </div>

                                                        </li>

                                                    </ul>

                                                </dl>

                                                <div class="buttons-set">

                                                    <button type="submit" title="Update Total" class="btn btn-light"

                                                            value="Update Total">

                                                        <span><span>Update Shipping Method</span></span>

                                                    </button>

                                                </div>

                                            </div>

                                        </div>

                                        <div class="deals deals-coupon">

                                            <div class="discount">


                                                <a href="#coupon-collapse" class="collapse-link collapsed link-body"

                                                   data-toggle="collapse">Add Coupon Code</a>


                                                <div id="coupon-collapse" class="collapse discount-form">


                                                    {{--                                                    <input type="hidden" name="remove" id="remove-coupone" value="0">--}}


                                                    <div class="input-group my-3">


                                                        <input class="form-control" type="text" id="coupon_code"

                                                               name="coupon_code" value="">


                                                        <div class="input-group-append">


                                                            <button type="button" title="Apply" class="btn btn-light"

                                                                    value="Apply">

                                                                Apply

                                                            </button>


                                                        </div>


                                                    </div>


                                                </div>


                                            </div>

                                        </div>


                                    </div>

                                    <div class="cart-totals-wrapper">


                                        <div class="cart-totals">


                                            <table id="shopping-cart-totals-table" class="table">

                                                <colgroup>

                                                    <col>

                                                    <col width="1">

                                                </colgroup>

                                                <tfoot>

                                                <tr class="grand-total item-totals-row">

                                                    <th style="" class="a-right" colspan="1">

                                                        Grand Total

                                                    </th>

                                                    <td style="" id="checkout_grand_total_parent" class="a-right value">

                                                        @if(session()->get('grand_total')!=null)
                                                            <span
                                                                class="price">${{session()->get('grand_total')}}</span>
                                                        @else
                                                            <span class="price">${{$sub_total}}</span></td>
                                                    @endif
                                                    </td>


                                                </tr>


                                                </tfoot>


                                                <tbody>


                                                <tr class="item-totals-row">


                                                    <th style="" class="a-right" colspan="1">

                                                        Subtotal

                                                    </th>


                                                    <td style="" class="a-right">

                                                        <span class="price">${{$sub_total}}</span></td>

                                                </tr>


                                                </tbody>


                                            </table>


                                            <ul class="checkout-types bottom  list-unstyled">


                                                <li class="method-checkout-cart-methods-onepage-bottom&quot;">


                                                    <a href="{{route('product.check_out')}}" title="Proceed to Checkout"

                                                       class="button btn btn-proceed-checkout btn-block btn-lg bg-warning text-white"

                                                    <span><span>Proceed to Checkout</span></span></a>


                                                </li>


                                            </ul>


                                        </div>


                                    </div>

                                </form>

                            </div>

                        </div>

                    @else

                        <p class="pt-md-3">Your cart is empty. There is no item in your cart.</p>

                    @endif

                </div>

            </div>


        </div>


    </div><br>
@endsection
