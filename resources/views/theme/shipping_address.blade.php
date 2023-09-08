@extends('theme.layouts.master')
@section('content')
    <div class="container bg-white">
        <div class="p-md-5">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>
                            {{ $error }}
                        </p>
                    @endforeach
                </div>
            @endif
            <h2 class="text-center">Secure Checkout</h2>
            <form method="post" action="{{route('shipping_address.store')}}">
                @csrf
{{--                <input name="order_id" type="hidden" value="{{$order->id}}">--}}
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h3 class="font-weight-bolder">1. Billing Address</h3>
                        <div class="form-group-sm">
                            <label for="email" class="{{ $errors->has('email') ? 'has-error' : '' }}">Email Address</label>
                            <input id="email" name="email" type="email" class="form-control">
                        </div>
                        <div class="form-group-sm">
                            <label for="name">Name</label>
                            <input id="name" name="name" type="text" class="form-control">
                        </div>
                        <div class="form-group-sm">
                            <label for="company">Company</label>
                            <input id="company" name="company" type="text" class="form-control">
                        </div>
                        <div class="form-group-sm">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" type="text" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="form-group-sm">
                            <label for="city">City</label>
                            <input id="city" name="city" type="text" class="form-control">
                        </div>
                        <div class="form-group-sm">
                            <label for="state">State</label>
                            <input id="state" name="state" type="text" class="form-control">
                        </div>
                        <div class="form-group-sm">
                            <label for="zip_code">Zip Code</label>
                            <input id="zip_code" name="zip_code" type="text" class="form-control">
                        </div>
                        <div class="form-group-sm">
                            <label for="country">Country</label>
                            <input id="country" name="country" type="text" class="form-control">
                        </div>
                        <div class="form-group-sm">
                            <label for="telephone">Telephone</label>
                            <input id="telephone" name="telephone" type="text" class="form-control">
                        </div>
                        <div class="form-group-sm">
                            <input type="checkbox" name="shipping" class="shipping_form_checkbox">
                            <span>Ship to the same address</span>
                        </div>
                    </div>
                </div>
                <div class="row mt-md-5" id="shipping_form">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h3 class="font-weight-bolder">Shipping Address</h3>
                        <div class="form-group-sm">
                            <label for="shipping_email">Email Address</label>
                            <input id="shipping_email" name="shipping_email" type="email" class="form-control">
                        </div>
                        <div class="form-group-sm">
                            <label for="shipping_name">Name</label>
                            <input id="shipping_name" name="shipping_name" type="text" class="form-control">
                        </div>
                        <div class="form-group-sm">
                            <label for="shipping_company">Company</label>
                            <input id="shipping_company" name="shipping_company" type="text" class="form-control">
                        </div>
                        <div class="form-group-sm">
                            <label for="shipping_address">Address</label>
                            <textarea id="shipping_address" name="shipping_address" type="text" class="form-control"
                                      rows="5"></textarea>
                        </div>
                        <div class="form-group-sm">
                            <label for="shipping_city">City</label>
                            <input id="shipping_city" name="shipping_city" type="text" class="form-control">
                        </div>
                        <div class="form-group-sm">
                            <label for="shipping_state">State</label>
                            <input id="shipping_state" name="shipping_state" type="text" class="form-control">
                        </div>
                        <div class="form-group-sm">
                            <label for="shipping_zip_code">Zip Code</label>
                            <input id="shipping_zip_code" name="shipping_zip_code" type="text" class="form-control">
                        </div>
                        <div class="form-group-sm">
                            <label for="shipping_country">Country</label>
                            <input id="shipping_country" name="shipping_country" type="text" class="form-control">
                        </div>
                        <div class="form-group-sm">
                            <label for="shipping_telephone">Telephone</label>
                            <input id="shipping_telephone" name="shipping_telephone" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row mt-md-5">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h3 class="font-weight-bolder">Payment Methods</h3>
                        <div class="form-group-sm">
                            <label for="cash">
                                <input id="cash" name="payment" type="radio" value="cash" class="form-control-md">
                                Cash on Delivery
                            </label>
                        </div>
                        <div class="form-group-sm">
                            <label for="paypal">
                                <input id="paypal" name="payment" type="radio" value="paypal" class="form-control-md">
                                Paypal
                            </label>
                        </div>
                        <span id="paypal_text" style="display: none;" class="text-danger">You will be redirected to the PayPal website.</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group mt-3 text-center">
                            <button class="btn btn-danger font-weight-bolder" type="submit">Place Order Now</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('.shipping_form_checkbox').click(function () {
            if ($('.shipping_form_checkbox').is(":checked")) {
                $('#shipping_form').hide();
            } else {
                $('#shipping_form').show();
            }
        });
        $('#paypal').click(function () {
            if ($('#paypal').is(":checked")) {
                $('#paypal_text').show();
            } else {
                $('#paypal_text').hide();

            }
        });
        $('#cash').click(function () {
            if ($('#paypal').is(":checked")) {
                $('#paypal_text').show();
            } else {
                $('#paypal_text').hide();

            }
        });
    </script>
@endsection


