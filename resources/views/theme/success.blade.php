@extends('theme.layouts.master')
@section('content')
    <div class="container-fluid bg-white p1-md-0">
        <div class="h2 text-center pt-md-5 pb-md-3 font-weight-bolder">Thanks</div>
        <p class="text-center">We're excited to make your custom order.</p>
        <p class="text-center">Your order # is: {{$order->order_no}}. </p>
        <p class="text-center p-md-2">
            Your order is confirmed. When we're
            done, we'll ship it and email a tracking number.
        </p>
    </div>
@endsection
@section('scripts')
@endsection

