@extends('theme.layouts.master')
@section('content')

    @if(Session::has('error_message'))
        <div class="alert alert-danger">
            {{ Session::get('error_message') }}
        </div>
    @endif
    @if(Session::has('danger_message'))
        <div class="alert alert-danger">
            {{ Session::get('danger_message') }}
        </div>
    @endif
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <h3 class="box-title text-center">Order Payment</h3>
                                                        <form accept-charset="UTF-8" action="{{ route('processCheckoutPaypal') }}" class=""
                                                              data-cc-on-file="false"
                                                              data-stripe-publishable-key="pk_test_H0n8RftpV3rgITLNU4HpFqMs"
                                                              id="payment-form" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <div class='form-control total btn btn-info'>
                                                                    Total: <span class='amount'>${{session()->get('grand_total')}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="form-group text-center">
                                                                <input type="image" name="submit" border="0"
                                                                       src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                                                                       alt="Buy Now">
                                                                <img alt="" border="0" width="1" height="1"
                                                                     src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
                                                            </div>
                                                        </form>
{{--
                            <form id="PayPla_Checkout" action="<?php print $apiURL; ?>" method="post">
                                <div class="form-group">
                                    <div class='form-control total btn btn-info'>
                                        Total: <span class='amount'>${{session()->get('grand_total')}}</span>
                                    </div>
                                </div>
                                <input type="hidden" name="cmd" value="_xclick">

                                <input type="hidden" name="business" value="<?php print $merchantID; ?>">
                                <input type="hidden" name="currency_code" value="USD">
                                <input type="hidden" name="lc" value="US">
                                <input type="hidden" name="handling" value="0">

                                <input type="hidden" name="no_shipping" value="1">

                                <input type="hidden" name="cpp_header_image" value="<?php print $cppHeaderImage; ?>">

                                <input type="hidden" name="custom" value="<?php print $transactionID; ?>">

                                <input type="hidden" name="item_name" value="Item Label">
                                <input type="hidden" name="item_number" value="<?php print $transactionID; ?>">
                                <input type="hidden" name="amount" value="{{$totalAmount}}">

                                <input type="hidden" name="cancel_return" value="{{route('payment_status',$order->id)}}">
                                <input type="hidden" name="return" value="{{route('payment_status',$order->id)}}">
                                <input type="hidden" name="cbt" value="Return to Merchant">

                                <div class="form-group text-center">
                                    <input type="image" name="submit" border="0"
                                           src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                                           alt="Buy Now">
                                    <img alt="" border="0" width="1" height="1"
                                         src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
                                </div>

                               --}}
{{-- <p><img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif"
                                        width="1" height="1"></p>--}}{{--


                            </form>
--}}


                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    <img src="{{asset('uploads/pay_sec.png')}}" alt="">
                                </div>
                            </div>
                            @if ((Session::has('success-message')))
                                <div class="alert alert-success col-md-12">{{
                                     Session::get('success-message') }}</div>
                            @endif @if ((Session::has('fail-message')))
                                <div class="alert alert-danger col-md-12">{{
                                      Session::get('fail-message') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- .row -->
        <!-- .right-sidebar -->

        <!-- /.right-sidebar -->
    </div>

@endsection
