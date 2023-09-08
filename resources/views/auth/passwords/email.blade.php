@extends('theme.layouts.master')
<style>
    h3 {
        font-size: 12px;
    }

    p {
        font-size: 12px;
        line-height: 0.5;
    }

    .bg-orange {
        background-color: orange
    }
</style>
@section('content')
    <div class="container bg-white border mt-4  mb-4">
        <h2 class="text-center pt-md-5 font-weight-bolder">Reset Password</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="pt-md-5 pl-md-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="generalForm" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Email Address </label>
                            <input id="email" type="email" placeholder="Email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <a href="{{route('login')}}" class="btn bg-danger text-white">
                                Back
                            </a>
                            <button type="submit" class="btn bg-warning text-white ">
                                Send Password Reset Link
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.generalForm').submit(function () {
            $('.white-box').LoadingOverlay("show");
            $("#generalForm").submit();
        });
    </script>
@endsection

{{--@extends('layouts.master')
@section('content')
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    @php $setting =\App\Setting::pluck('value','name')->toArray(); @endphp
    <section id="wrapper" class="new-login-register">
        <div class="lg-info-panel">
            <div class="inner-panel">
                <a href="javascript:void(0)" class="p-20 di"><img src="@isset($setting['logo']) {{ asset('uploads/'.$setting['logo']) }}@endisset"></a>
                <div class="lg-content">
                    <h2>@isset($setting['auth_page_heading']) {{ $setting['auth_page_heading'] }}@endisset</h2>
                    <p class="text-muted">@isset($setting['auth_page_desc']) {{ $setting['auth_page_desc'] }}@endisset</p>
                </div>
            </div>
        </div>
        <div class="new-login-box">
            <div class="white-box">
                <h3 class="box-title m-b-0">Reset Password</h3>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="form-horizontal generalForm" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">{{ __('Send Password Reset Link') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script type="text/javascript">
        $('.generalForm').submit(function () {
            $('.white-box').LoadingOverlay("show");
            $("#generalForm").submit();
        });
    </script>

@endsection--}}
